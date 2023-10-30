<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReaderRequest;
use App\Http\Requests\UpdateReaderRequest;
use App\Models\Readers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReadersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all readers
        $reader = Readers::with('user')->get();
        return $reader;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8',
            'phone_number' => 'required|string|max:10|unique:users',
            'address' => 'required|string|max:8',
            'user_id'=> 'required'
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'address.required' => 'The address field is required.',
            'address.min' => 'The address must not exceed 8 characters.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.min' => 'The phone number must not exceed 10 characters.',
            'user_id.required'=> 'the user id must be filled',
    
             ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
            if($validator -> fails())
            {
                return response() -> json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            $reader = Readers::create($request->all());

            return response()->json([
                'sucess' => true,
                'message' => 'Reader created successfully',
                'Reader_id' => $reader->id, // Include the ID in the response
       
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReaderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $reader = Readers::find($id);
    
        if (!$reader) {
            return response()->json([
                'status' => false,
                'message' => 'Reader not found'
            ], 404);
        }
        return response()->json($reader);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Readers $reader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reader = Readers::find($id);

        if (!$reader) {
            return response()->json([
                'status' => false,
                'message' => 'Reader not found'], 404);
        }

        // Validate the incoming request data
       $validatedData = $request->validate([
        'name' => 'string|max:255|nullable',
        'phone_number' => 'string|max:10|unique:users|nullable',
        'cart_id'=>'exists:cart,id|nullable',
        'order_id'=> 'exists:orders,id|nullable',
        ]);

        // Update the author record
        $reader->update($validatedData);
        // $reader->save();

        return response()->json([
            'status' => true,
            'message' => 'Reader updated successfully',
            'return_data' => $reader->update($validatedData),
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reader = Readers::find($id);

        if (!$reader) {
            return response()->json([
                'status' =>false,
                'message' => 'Reader not found'
        ], 404);

        }

        // Delete the author record
        $reader->delete();
        
        return response()->json([
            'status' =>true,
            'message' => 'Reader deleted successfully'
        ]);
    }
}
