<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFeilds=$request->validate([
            'name' => ['required','min:3','max:20'],
            'email' => ['required','email'],
            'password' => ['required','min:6','max:200'],
        ]); 
        return 'Hello from our controller';
    }
}
