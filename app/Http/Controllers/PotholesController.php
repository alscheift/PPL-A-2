<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Pothole;

class PotholesController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin', auth()->user())) {
            $potholes = Pothole::all();
            return view('admin.potholes', compact('potholes'));
        } else {
            $potholes = Pothole::where('id_user', auth()->id())->get();
            return view('user.potholes', compact('potholes'));
        }
    }

    public function create()
    {
        return view('form');
    }

    public function store(){
        $data = request()->validate([
            'lat' => 'required',
            'long' => 'required',
            'desc' => 'required',
        ]);

        $data['id_user'] = auth()->id();
        $data['is_approved'] = 'Pending';

        // store image
        $imagePath = request('file')->store('potholes', 'public');
        $data['image'] = $imagePath;
        Pothole::create($data);

        return redirect()->route('potholes.index')->with('success', 'Pothole reported successfully');
    }

}
