<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PotholesController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin', auth()->user())) {
            return view('admin.potholes');
        } else {
            return view('user.potholes');
        }
    }
}
