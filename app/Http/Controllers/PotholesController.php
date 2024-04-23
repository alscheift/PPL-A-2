<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Pothole;
use App\Actions\ML\RoadSegmentation;

class PotholesController extends Controller
{
    public function index()
    {
        
        if (Gate::allows('admin', auth()->user())) {
            $potholes = Pothole::orderby('is_damaged', 'desc')->orderby('updated_at', 'desc')->get();
            return view('admin.potholes', compact('potholes'));
        } else {
            $potholes = Pothole::orderby('is_damaged', 'desc')->orderby('updated_at', 'desc')->get();
            return view('user.potholes', compact('potholes'));
        }
    }

    public function showMap()
    {
        $potholes = Pothole::select('lat', 'long')->get(); // Mengambil data latitude dan longitude dari database potholes
        return view('home', compact('potholes'));
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
        $imagePath = request('file')->store('images', 'public');
        $data['image'] = $imagePath;
        
        // predict the image
        $roadSegmentation = RoadSegmentation::predict($imagePath);
        
        if($roadSegmentation->is_damaged) {
            // @dd('damaged');
            $data['is_damaged'] = 1;
            $data['damage_percentage'] = $roadSegmentation->damage_precent;
            $data['segmented_image_path'] = $roadSegmentation->filename;
        } else{
            $data['is_damaged'] = 0;
        }
        
        Pothole::create($data);

        // dd($data);
        return redirect()->route('potholes.index')->with('success', 'Pothole reported successfully');
    }

}
