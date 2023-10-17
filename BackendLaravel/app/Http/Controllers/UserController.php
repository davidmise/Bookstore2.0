<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Authors;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

// use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //display user input
        
        $users = User::get();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    
     
        //LogIn Authentication 
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
         $data = $request -> all();
        //  return response()->json(
        //     [
        //         'message' => " from data captured  by api succesfully",
        //     ]
        //     );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with("author")->find($id);

        if(!$user){
             return response()->json(
            [
                "status" => false,
                'message' => "User not found",
            ]
            );
        }

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // eddit user details
    public function edit(Request $request)
    {
        $user = User::find($request->id);

        if(!$user){
            return response()->json(
           [
               "status" => false,
               'message' => "User not found",
           ]
           );
       }

       $user->update([
        'name' => $request->name,
        'email' => $request['email'],
        'password' => $request->password,
        'address' => $request->address,
        'phone_number' => $request['phone_number'],
        'role' => $request['role']
       ]);
  

    return response()->json(
        [
            "status" => true,
            'message' => "User successfully updaed",
        ]
        );


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'User not found so cant be deleted'
        ], 404);
    }

    $user->delete();

    return response()->json([
        'status' => true,
        'message' => 'User deleted successfully'
    ]);
        //
    }
}
