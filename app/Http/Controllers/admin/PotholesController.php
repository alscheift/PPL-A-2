<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pothole;
use Illuminate\Http\Request;

class PotholesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $potholes = Pothole::with([
            'User'
        ])->where([
            ['is_damaged', "=", 1],
            ['is_approved', "=", "Pending"]
        ])->orderby('created_at', 'asc')->get();

        return view('admin.potholes', [
            'potholes' => $potholes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pothole $pothole)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pothole $admin_pothole)
    {
        $admin_pothole->is_approved = "Approved";

        $admin_pothole->save();

        return redirect()->route('admin.admin-potholes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pothole $admin_pothole)
    {
        $admin_pothole->is_approved = "Not Approved";

        $admin_pothole->save();

        return redirect()->route('admin.admin-potholes.index');
    }
}
