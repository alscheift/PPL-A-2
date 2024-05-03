<?php

namespace App\Http\Controllers;
use App\Models\Pothole;

class GuestsController extends Controller
{
    public function index()
    {
        $potholes = Pothole::select('lat', 'long', 'desc', 'is_damaged', 'address', 'is_approved')->get(); // Mengambil data latitude dan longitude dari database potholes
        return view('guest.home', compact('potholes'));
    }
}
