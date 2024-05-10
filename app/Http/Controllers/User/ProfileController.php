<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // index functio
    public function index()
    {
        return "
            <h4>Hello " . auth()->user()->name . "</h4>
            <p>Welcome to your profile page</p>
        ";
    }
}
