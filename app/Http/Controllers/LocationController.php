<?php

namespace App\Http\Controllers;

use App\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index(){
        //display all of the locations
        $locations = location::orderBy('location_id','desc')->paginate(20);
        return view('/kws/new_location',['locations'=>$locations]);
    }

    public function store(Request $request){
        //save data to the database
        $request->validate([
           'location_name'=>'required|string|min:3|unique:locations',
            'latitude'=>'numeric|min:2',
            'longitude'=>'numeric|min:2'
        ]);

        //save to the database
        $locations = new location();
        $locations->location_name = request('location_name');
        $locations->county = request('county');
        $locations->latitude = request('latitude');
        $locations->longitude = request('longitude');
        $locations->save();

        return back()->with('message','New Location has been saved successfully');
    }
}
