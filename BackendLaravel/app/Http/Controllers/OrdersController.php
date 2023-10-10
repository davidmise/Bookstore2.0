<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Validator; 

    class OrdersController extends Controller
    {
        // Create a new author record
        public function create(Request $request)
        {
            $rules = [
                'user_id' => 'required|exists:books,id',
                'total_price' => 'required|numeric',
                'order_date' => 'required|date',
            ];
    
            $messages = [
                'user_id.required' => 'user id must be filled',
                'total_price.required' => 'total price must be filled',
                'order_date.required' => 'order date must be filled',
                'order_date.date' => 'order date must follow date format',
            ];
        
            $validator = Validator::make($request -> all(), $rules, $messages);
                if($validator -> fails())
                {
                    return response() -> json([
                        'status' => false,
                        'errors' => $validator->errors()
                    ], 422);
                }
    
            // Create a new author record
            $orders = Orders::create($request->all());
    
            return response()->json([
                'stauts' => true,
                'message' => 'Orders created successfully'
            ], 201);
        }
    
        // Retrieve an author by ID
        public function show($id)
        {
            $orders = Orders::find($id);
    
            if (!$orders) {
                return response()->json([ 
                'stauts' => false, 
                'message' => 'Orders not found'], 404);
            }
    
            return response()->json($orders);
        }
    
        // Update an author by ID
        public function update(Request $request, $id)
        {
            $orders = Orders::find($id);
    
            if (!$orders) {
                return response()->json([
                'status' => false,
                'message' => 'Orders not found'], 404);
            }
    
            // Validate the incoming request data
            $request->validate([

                // Add more validation rules as needed
                'total_price' => 'required|numeric',
                'order_date' => 'required|date',
            ]);
    
            // Update the orders record
            $orders->update($request->all());
    
            return response()->json([
                'stauts' => true,
                'message' => 'Orders updated successfully']);
        }
    
        // Delete an author by ID
        public function destroy($id)
        {
            $orders = Orders::find($id);
    
            if (!$orders) {
                return response()->json([
                    'stauts' => false,
                    'message' => 'Orders not found'], 404);
            }
    
            // Delete the author record
            $orders->delete();
    
            return response()->json([
                'stauts' => true,
                'message' => 'Orders deleted successfully']);
        }
    }
    