<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_items;
use Illuminate\Support\Facades\Validator; 

class OrderItemsController extends Controller
{
    // Create a new book record
    public function create(Request $request)
    {

        $rules = [
            'order_id' => 'required|string|max:255',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|numeric',
        ];

        $messages = [
            'order_id.required' => 'Order id must be filled',
            'order_id.id' => 'invalid id format',
            'book_id.required' => 'book id must be filled',
            'book_id.id' => 'invalid id format',
            'quantity.required' => 'quantity must be filled',
            'quantity.numeric' => 'invalid quantity format',
        ];
    
        $validator = Validator::make($request -> all(), $rules, $messages);
            if($validator -> fails())
            {
                return response() -> json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

       
        // Create a new book record
        $order_items = Order_items::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Order_items created successfully'
        ], 201);
    }

    // Retrieve a book by ID
    public function show($id)
    {
        $order_items= Order_items::find($id);

        if (!$order_items) {
            return response()->json(['message' => 'Order_itemsnot found'], 404);
        }

        return response()->json($order_items); 
    }

    // Update a book by ID
    public function update(Request $request, $id)
    {
        $order_items = Order_items::find($id);

        if (!$order_items) {
            return response()->json(['message' => 'Order_itemsnot found'], 404);
        }

        // Validate the incoming request data
        $request->validate([
            'quantity' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        // Update the book record
        $order_items->update($request->all());

        return response()->json(['message' => 'Order_items updated successfully']);
    }

    // Delete a book by ID
    public function destroy($id)
    {
        $order_items = Order_items::find($id);

        if (!$order_items) {
            return response()->json(['message' => 'Order_items not found'], 404);
        }

        // Delete the book record
        $order_items->delete();

        return response()->json(['message' => 'Order_items deleted successfully']);
    }
}

