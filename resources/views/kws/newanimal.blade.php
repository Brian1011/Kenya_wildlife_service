<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 10/12/2018
 * Time: 12:06 PM
 */
?>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="center-block text-center">Register New Animal Specie</h1><br><br>
            <!--Check for an error message-->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!--Check for a sucess / error message-->
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif

            <form method="post" action="/animal/save" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Animal Name</label>
                    <input type="text" placeholder="Animal Name" name="animal_name" class="form-control" value="{{old('animal_name')}}">
                </div>

                <div class="form-group">
                    <label>Scientific Name</label>
                    <input type="text" placeholder="Scientific Name" name="scientific_name" class="form-control" value="{{old('scientific_name')}}">
                </div>

                <div class="form-group">
                    <label>Animal Name</label>
                    <select class="form-control" name="animal_category">
                        <option value="Mammals">Mammal</option>
                        <option value="Birds">Birds</option>
                        <option value="Reptiles">Reptiles</option>
                        <option value="Fish">Fish</option>
                        <option value="Trees">Trees</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-lg btn-success center-block" type="submit" >Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
