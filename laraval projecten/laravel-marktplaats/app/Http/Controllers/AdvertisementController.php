<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $advertisements = Advertisement::query()
        ->when($request->search, fn ($query, $search) => $query->whereFullText(['title', 'description'], $search))
        ->when($request->category, fn ($query, $category) => $query->where('category_id', $category))
        ->latest()
        ->orderBy('is_promoted', 'desc')
        ->orderBy('created_at', 'desc')
        ->orderBy('promoted_at', 'desc')
        ->paginate(8)
        ->withQueryString();

        $categories = Category::all();

        return view('advertisements.index', compact('advertisements', 'categories'));
    }

    public function byUser(User $user)
    {
        $advertisements = Advertisement::where('user_id', $user->id)
        ->latest()
        ->paginate(8);

        return view('advertisements.by-user', compact('advertisements', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('advertisements.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvertisementRequest $request)
    {
        $validated = $request->validated();

        Advertisement::create($validated);

        return redirect()->route('user.advertisements.index', Auth::user());
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $ordered_bids = $advertisement->bids()->orderBy('amount', 'desc')->get();
        $highest_bid = $ordered_bids->first();

        return view('advertisements.show', compact('advertisement', 'ordered_bids', 'highest_bid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        $categories = Category::all();

        return view('advertisements.edit', compact('advertisement', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertisementRequest $request, Advertisement $advertisement)
    {
        $advertisement->update($request->validated());

        return redirect()->route('user.advertisements.index', Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('user.advertisements.index', Auth::user());
    }

    public function promote(Advertisement $advertisement)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        elseif (Auth::id() != $advertisement->user_id){
            return redirect()->back();
        }

        return view('advertisements.promote', compact('advertisement'));
    }
}
