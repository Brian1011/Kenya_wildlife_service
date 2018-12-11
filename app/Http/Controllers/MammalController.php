<?php

namespace App\Http\Controllers;

use App\animal;
use App\location;
use App\mammal;
use Illuminate\Http\Request;

class MammalController extends Controller
{
    //
    public function index(){
        //get all mammals
        $mammal = animal::where('category','=','Mammals')->orderBy('animal_name','asc')->get();
        $locations = location::orderBy('location_name','asc')->get();

        //$locations = location::all();
        $current_year = 2000;
        $years = array();
        for($index = 0; $index<=20; $index++ ){
            $years[$index] = $current_year;
            $current_year = $current_year + 1;
        }
        return view('kws/newmammal',['animals'=>$mammal,'locations'=>$locations,'years'=>$years]);
    }

    public function store(Request $request){
        /*
         * store the mammals info
         * validate the data
        */
        $request->validate([
           'population'=>'required|integer',
            'status'=>'required|string',
        ]);

        /*
         * compare the two dates year from and year t
         */

        $mammal = new mammal();
        $mammal->animal_id = request('mammal_name');
        $mammal->location_id = request('locations');
        $mammal->year_from = request('year_from');
        $mammal->year_to = request('year_to');
        $mammal->population = request('population');
        $mammal->Status = request('status');
        $mammal->save();

        return back()->with('message','New Record has been saved sucessfully');
    }

    public function show(){
        //display mammal info

    }
}
