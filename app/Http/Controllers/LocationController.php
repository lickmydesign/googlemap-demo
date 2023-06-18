<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index() {
        
        $locations = Location::whereRaw('1 = 1')->orderBy('created_at', 'desc')->get();

        return view('home', ['locations' => $locations]);
    }

    public function store(StoreLocationRequest $request){

        $validated = $request->validated();

        $location = Location::create($validated); # Mass asignment

        $location_name = $location->name;
        $success_mess = $location_name ? "Location '{$location_name}' saved successfully" : "Location saved successfully";

        return redirect()
            ->route('home')
            ->with('success', $success_mess);

        // return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $validated = $request->validated();

        $location->update($validated);

        return redirect()
            ->route('home', [$location])
            ->with('success', 'Location updated successfully');
    }

    public function destroy(Location $location)
    {
        $location_name = $location->name;
        $success_mess = $location_name ? "Location '{$location_name}' deleted successfully" : "Location deleted successfully";

        $location->delete();

        return redirect()
            ->route('home')
            ->with('success', $success_mess);
    }
}
