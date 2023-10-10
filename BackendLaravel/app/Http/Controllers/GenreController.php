<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator; 



class GenreController extends Controller
{
    public function index()
    {
        //display user input
        
        $genre = Genre::get();
        return $genre;
    }
    // Create a new author record
    public function create(Request $request)
    {
        $rules = [
            'category' => 'required|string|max:255'
        ];

        $messages = [
            'category.required' => 'category must be filed'
            
        ];
    
        $validator = Validator::make($request -> all(), $rules, $messages);
            if($validator -> fails())
            {
                return response() -> json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
        // Validate the incoming request data
        // $request->validate([
        //     'category' => 'required|string|max:255'
        // ]);

        // Create a new author record
        $genre = Genre::create($request->all());

        return response()->json([
            'message' => 'Genre created successfully',
            'status' => true,
            'genre_id' => $genre->id, // Include the ID in the response
        ], 201);
    }

    // Retrieve an author by ID
    public function show($id)
    {
        $Genre = Genre::find($id);

        if (!$Genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        return response()->json($Genre);
    }

    // Update an author by ID
    public function update(Request $request, $id)
    {
        $Genre = Genre::find($id);

        if (!$Genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the author record
        $Genre->update($request->all());

        return response()->json(['message' => 'Genre updated successfully']);
    }

    // Delete an author by ID
    public function destroy($id)
    {
        $Genre = Genre::find($id);

        if (!$Genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        // Delete the author record
        $Genre->delete();

        return response()->json(['message' => 'Genre deleted successfully']);
    }
}
