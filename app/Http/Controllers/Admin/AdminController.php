<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // index
    public function index()
    {
        return to_route('admin.users.index');
    }
}
