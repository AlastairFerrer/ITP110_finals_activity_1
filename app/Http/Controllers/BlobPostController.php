<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlobPostController
{
    public function showMainPage(){
        $isLoggedIn = session('user_id');

        return view('blob', compact('isLoggedIn') );
    }
}
