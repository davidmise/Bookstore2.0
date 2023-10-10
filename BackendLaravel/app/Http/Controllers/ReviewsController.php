<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Validator; 


class ReviewsController extends Controller
{
    // Create a new review record
    public function create(Request $request)
    {
        $rules = [
            'user_id' => 'required|string|max:255',
            'book_id' => 'required|exists:books,id',
            'ratings' => 'required|decimal',
            'comments' => 'required|string',
        ];

        $messages = [
            'user_id.required' => 'user id must be filled',
            'book_id.required' => 'book id must be filled',
            'ratings.required' => 'rattings must be fiiled',
            'comments.required' => 'comments must be filled',
        ];

        // Validate the incoming request data
        $validator = Validator::make($request -> all(), $rules, $messages);
            if($validator -> fails())
            {
                return response() -> json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

        // Create a new review record
        $Reviews = Review::create($request->all());

        return response()->json(['message' => 'Reviews created successfully'], 201);
    }

    // Retrieve a review by ID
    public function show($id)
    {
        $Reviews= Review::find($id);

        if (!$Reviews) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($Reviews); 
    }

    // Update a review by ID
    public function update(Request $request, $id)
    {
        $Reviews = Review::find($id);

        if (!$Reviews) {
            return response()->json(['message' => 'Reviews not found'], 404);
        }

        // Validate the incoming request data
        $request->validate([
            // Add more validation rules as needed
            'ratings' => 'required|numeric',
            'comments' => 'required|string',
        ]);

        // Update the review record
        $Reviews->update($request->all());

        return response()->json(['message' => 'Reviews updated successfully']);
    }

    // Delete a review by ID
    public function destroy($id)
    {
        $Reviews = Review::find($id);

        if (!$Reviews) {
            return response()->json(['message' => 'Reviews not found'], 404);
        }

        // Delete the review record
        $Reviews->delete();

        return response()->json(['message' => 'Reviews deleted successfully']);
    }
}

