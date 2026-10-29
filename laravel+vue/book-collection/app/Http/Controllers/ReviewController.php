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
        return ReviewResource::collection($book->reviews()->latest()->get());
    }

    public function store(StoreReviewRequest $request, Book $book) {
        $validated = $request->validated();
        
        $arguments = array_merge($validated,[
            'book_id' => $book->id
        ]);

        $review = Review::create($arguments);

        $reviews = $book->reviews()->latest()->get();
        return ReviewResource::collection($reviews);
    }

    public function update(StoreReviewRequest $request, Book $book, Review $review) {
        $validated = $request->validated();
        

        $review->update($validated);

        $reviews = $book->reviews()->latest()->get();
        return ReviewResource::collection($reviews);
    }

    public function destroy(Review $review) {
        $review->delete();
        return response()->json(['message' => 'Review succesvol verwijderd']);
    }
}
