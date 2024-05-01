<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // index
    public function index()
    {
        dd('indexusers');
        return view('admin.users.index');
    }
}
