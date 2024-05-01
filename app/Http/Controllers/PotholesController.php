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
        $potholes = Pothole::orderby('is_damaged', 'desc')->orderby('created_at', 'desc')->get();
        return view('user.potholes', compact('potholes'));
    }

    public function showMap()
    {
        $potholes = Pothole::select('lat', 'long', 'desc', 'is_damaged', 'address')->get(); // Mengambil data latitude dan longitude dari database potholes
        return view('home', compact('potholes'));
    }

    public function destroy($id)
    {
        $potholes = Pothole::findOrFail($id);
        // Hapus data pothole dari database
        $potholes->delete();

        // Redirect ke halaman dashboard atau halaman daftar pothole
        return redirect()->route('potholes.index')->with('success', 'Pothole deleted successfully');
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
            'address' => 'required',
        ]);

        $data['id_user'] = auth()->id();
        if(auth()->user()->is_verified) {
            $data['is_approved'] = 'Approved';
        }
        else {
            $data['is_approved'] = 'Pending';
        }
        
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
