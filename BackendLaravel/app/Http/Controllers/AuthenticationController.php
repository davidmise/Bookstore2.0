<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Authors;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator; 

class AuthenticationController extends Controller
{
//    user creation / registration/Singup
    public function create (Request $request)
     {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:8',
            'phone_number' => 'required|string|max:10|unique:users',
            'role' => 'required'
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'address.required' => 'The address field is required.',
            'address.min' => 'The address must not exceed 8 characters.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.min' => 'The phone number must not exceed 10 characters.',
            'role.required' => 'The role Must be filled the radios'
        ];
    
        $validator = Validator::make($request -> all(), $rules, $messages);
            if($validator -> fails())
            {
                return response() -> json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
    
        // return $request;
        $myModel = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), //  hash the password
            'address' => $request ->input('address'),
            'phone_number' => $request->input('PhoneNumber'),
            'role' =>  $request->input('role'),
           
        ]);
    
        $myModel->save();
    
        return response()->json([
            'status' => true,
            'message' => 'User created successfully'
        ], 201);
    }

    // user login/singin
    public function login (Request $request)
    {
        $rules =[
            'email' => 'required|email|max:225|string',
            'password' =>'required|string|min:8',
        ];

        $messages =[
            'email.required' => 'email is required',
            'email.email' => 'invalid email',
            'password.required' =>'password field should not be empty ',
        ];

        $credentials = Validator::make($request -> all(), $rules, $messages);

        if($credentials -> fails())
        {
            return response() -> json([
                'status' => false,
                'errors' => $credentials->errors()
            ], 422);
        }

        $credentials = $request->validate([
            'email' => 'required|email|max:225|string',
            'password' =>'required|string|min:8',
        ]);

        if(Auth::guard()->attempt($credentials)) {
            $user = User::with('author')->find(Auth::user()->id);
            return response()->json([
                "status" => true,
                'message' => 'User logged in successfully',
                'user'=> $user,
               
            ], 201);
        }
        // ask ai to get user id on the code above
        else{

            return response()->json([
                "status" => false,
                'message' => 'User loggin fail. Incorrect email or password'
            ], 401);
        }
    }
}
