<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFeilds=$request->validate([
            'name' => ['required','min:3','max:20'],
            'email' => ['required','email'],
            'password' => ['required','min:6','max:200'],
        ]); 

        $incomingFeilds['password'] = bcrypt($incomingFeilds['password']);
        User::create($incomingFeilds);
        return 'Hello from our controller';
    }
}
