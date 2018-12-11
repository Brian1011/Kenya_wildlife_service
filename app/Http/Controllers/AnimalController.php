<?php

namespace App\Http\Controllers;

use App\animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //
    public function index(){
        $all_animals = animal::orderBy('animal_id','desc')->paginate(5);
        return view('kws/newanimal',['animals'=>$all_animals]);
    }

    public function store(Request $request){
        //validate the data
        $request->validate([
            'animal_name'=>'required|string|min:3',
            'scientific_name' => 'required|string|min:3|unique:animals'
        ]);

        //if okay save to database
        $animal = new animal();
        $animal->animal_name = request('animal_name');
        $animal->scientific_name = request('scientific_name');
        $animal->category = request('animal_category');
        $animal->save();

        //return back to the url
        return back()->with('message','Record has been saved sucessfully');
    }

    public function show(){
        //show all records
        $all_animals = animal::all();
        return view('kws/newanimal',['animals'=>$all_animals]);
    }
}
