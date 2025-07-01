<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::latest()->paginate(10);
        return view('admins.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    return view('admins.locations.create');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        $data = $request->except("_token", 'image');

        Location::create($data);

        return redirect()->route('admin.location.index')->with('success', 'Location Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return view('admins.locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('admins.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, Location $location)
    {
        $data = $request->except("_token", 'image');
        $location->update($data);

        return redirect()->route('admin.location.index')->with('success', 'Location Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('admin.location.index')->with('success', 'Location Deleted Successfully');
    }
}
