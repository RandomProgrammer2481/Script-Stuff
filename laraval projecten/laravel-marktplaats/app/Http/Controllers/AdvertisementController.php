<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdvertisementRequest;
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
        ->when($request->category, fn ($q, $category) => $q->where('category_id', $category))
        ->latest()
        ->paginate(15)
        ->withQueryString();

        return view('advertisements.index', compact('advertisements'));
    }

    public function byUser(User $user)
    {
        $advertisements = Advertisement::where('user_id', $user->id)
        ->latest()
        ->paginate(15);

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
        if (Auth::check()){


            return view('advertisements.show', compact('advertisement'));
        } else {
            return redirect()->route('login');
        }
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
    public function update(StoreAdvertisementRequest $request, Advertisement $advertisement)
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
}
