<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 11/12/2018
 * Time: 09:24 PM
 */
?>

@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="center-block text-center">Register New Animal Location</h1>
                </div>

                <div class="panel-body">
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

                    <form method="post" action="/location/save" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Location Name</label>
                            <input type="text" placeholder="Location Name" name="location_name" class="form-control" value="{{old('location_name')}}">
                        </div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" placeholder="Enter Latitude" name="latitude" class="form-control" value="{{old('latitude')}}">
                        </div>

                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" placeholder="Enter Longitude" name="longitude" class="form-control" value="{{old('longitude')}}">
                        </div>


                        <div class="form-group">
                            <button class="btn btn-lg btn-primary center-block" type="submit" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Display The data-->
        <div class="col-md-8">
            <h1 class="center-block text-center">All Registered Animals</h1>
            <table class="table table-hover table-responsive">
                <tr class="success">
                    <th>Species_Id</th>
                    <th>Animal Name</th>
                    <th>Scientific Name</th>
                    <th>Category</th>
                    <th>Options</th>
                </tr>

                @foreach($animals as $animal)
                    <tr>
                        <td>{{$animal->animal_id}}</td>
                        <td>{{$animal->animal_name}}</td>
                        <td>{{$animal->scientific_name}}</td>
                        <td>{{$animal->category}}</td>
                        <td>
                            <a href="/edit/{{$animal->animal_id}}" class="btn btn-success">Edit</a>
                            <a href="/delete/{{$animal->animal_id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                {{$animals->links()}}
            </table>
        </div>
    </div>
@endsection
