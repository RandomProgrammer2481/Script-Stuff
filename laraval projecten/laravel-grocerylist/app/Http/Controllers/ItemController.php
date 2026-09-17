<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // Haalt de gevalideerde gegevens op uit de StoreItemRequest class
        $validated = $request->validated();

        $item = new Item();

        // Stelt de 'name' en 'description' waarden in op het gevalideerde gegevens
        $item->name = $validated['name'];
        $item->description = $validated['description'];

        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // Haalt de gevalideerde gegevens op uit de UpdateItemRequest class
        $validated = $request->validated();

        // Stelt de 'name' en 'description' waarden in op het gevalideerde gegevens
        $item->name = $validated['name'];
        $item->description = $validated['description'];

        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
