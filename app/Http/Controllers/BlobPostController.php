<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\BlogPosts;

class BlobPostController
{
    public function showMainPage(){

        $posts = BlogPosts::all(); 
        $isLoggedIn = session('user_id');

        return view('blob', compact('isLoggedIn', 'posts') );
    }

    public function createBlob(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required|string',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->messages()], 422);
            }
            
            BlogPosts::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => session('user_id')
            ]);

            session(['status' => 200, 'message' => 'Blob Successfully Created!']);

        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
