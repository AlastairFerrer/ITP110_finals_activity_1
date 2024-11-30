<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController
{
    public function login(Request $request){
        try{
            $model = User::where('email', $request->email)->first();

            if($model && Hash::check( $request->password, $model->password)){

                session()->forget('status', 'error');
                session(['user_id' => $model->id]);

                return response()->json(['status'=> 200 ,'message' => 'Successfully logged in!' ], 200);
                
            } else {

                session(['status' => 401 , 'error' => 'Incorrect credentials!']);

            }
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        try{
            
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->messages()], 422);
            } 

            $validated = $validator->validated();

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            return response()->json(['message' => 'Successfully Registered!'], 500);
            
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function logout(){
        session()->forget('user_id');

        return response()->json([ 'status'=> 200, 'message' => 'Logged out Successfully!'], 200);
    }
}
