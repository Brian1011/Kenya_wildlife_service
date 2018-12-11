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
                    <h1 class="center-block text-center">Register New Location</h1>
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
                            <label>Select County</label>
                            <select class="form-control" name="county">
                                <option value="Baringo">Baringo</option>
                                <option value="Bomet">Bomet</option>
                                <option value="Bungoma">Bungoma</option>
                                <option value="Busia">Busia</option>
                                <option value="Nairobi">Nairobi</option>
                            </select>
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
            <h1 class="center-block text-center">All Registered Locations</h1>
            <table class="table table-hover table-responsive">
                <tr class="success">
                    <th>Location Id</th>
                    <th>Location Name</th>
                    <th>County</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Options</th>
                </tr>

                @foreach($locations as $location)
                    <tr>
                        <td>{{$location->location_id}}</td>
                        <td>{{$location->location_name}}</td>
                        <td>{{$location->county}}</td>
                        <td>{{$location->latitude}}</td>
                        <td>{{$location->longitude}}</td>
                        <td>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

                {{$locations->links()}}
            </table>
        </div>
    </div>
@endsection
