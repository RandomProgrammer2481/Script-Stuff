<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Book $book) {
        return ReviewResource::collection(Review::all());
    }

    public function store(StoreReviewRequest $request) {
        $validated = $request->validated();

        $review = Review::create($validated);

        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }

    public function update(StoreReviewRequest $request, Review $review) {
        $validated = $request->validated();
        

        $review->update($validated);

        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }

    public function destroy(Review $review) {
        $review->delete();
        return response()->json(['message' => 'Review succesvol verwijderd']);
    }
}
