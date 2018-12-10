<?php

namespace App\Http\Controllers;

use App\animal;
use App\location;
use Illuminate\Http\Request;

class MammalController extends Controller
{
    //
    public function index(){
        //get all mammals
        $mammal = animal::where('category','=','Mammals')->orderBy('animal_name','desc')->get();
        $locations = location::orderBy('location_name','desc');
        return view('kws/newmammal',['animals'=>$mammal,'locations'=>$locations]);
    }

    public function store(){

    }
}
