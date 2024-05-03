<?php

namespace App\Http\Controllers;

use App\Models\Pothole;
use App\Actions\ML\RoadSegmentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PotholesController extends Controller
{
    public function index()
    {
        $potholes = Pothole::orderby('is_damaged', 'desc')->orderby('created_at', 'desc')->get();
        return view('user.potholes.index', compact('potholes'));
    }


    public function destroy($id)
    {
        $potholes = Pothole::findOrFail($id);
        // Hapus data pothole dari database
        $potholes->delete();


        // Redirect ke halaman dashboard atau halaman daftar pothole
        return redirect()->route('potholes.index')->with('success', 'Pothole deleted successfully');
    }

    public function create(Request $request)
    {   
        $success = $request->get('success'); 
        if($success){
            $latestPothole = Pothole::where('id_user', Auth::id())->latest()->first(); // jika akses create dengan submit sebelumnya, menampilkan hasil
        } else { 
            $latestPothole = NULL; 
        }
        return view('user.potholes.create', compact('latestPothole'));
    }

    public function store()
    {
        $data = request()->validate([
            'lat' => 'required',
            'long' => 'required',
            'desc' => 'required',
            'address' => 'required',
        ]);

        $data['id_user'] = auth()->id();
        if (auth()->user()->is_verified) {
            $data['is_approved'] = 'Approved';
            $data['id_verificator'] = auth()->id();
        } else {
            $data['is_approved'] = 'Pending';
        }
        // store image
        $imagePath = request('file')->store('images', 'public');
        $data['image'] = $imagePath;

        // predict the image
        $roadSegmentation = RoadSegmentation::predict($imagePath);

        if ($roadSegmentation->is_damaged) {
            // @dd('damaged');
            $data['is_damaged'] = 1;
            $data['damage_percentage'] = $roadSegmentation->damage_precent;
            $data['segmented_image_path'] = $roadSegmentation->filename;
        } else {
            $data['is_damaged'] = 0;
        }

        Pothole::create($data);

        return redirect()->route('potholes.create')->with('success', 'true'); // success jgn diubah, digunakan untuk menampilkan hasil submit
    }
}
