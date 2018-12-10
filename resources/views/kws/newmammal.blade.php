<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 10/12/2018
 * Time: 02:15 PM
 */
?>
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3" >
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="center-block text-center">Register New Mammal Info</h1>
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

                        <form method="post" action="/animal/save" role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Mammal Name</label>
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
                                <button class="btn btn-lg btn-primary center-block" type="submit" >Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!--Display The data-->
        <div class="col-md-6 col-md-offset-3">
            <h1 class="center-block text-center">All Mammals Info</h1>
            <table class="table table-hover table-responsive">
                <tr class="success">
                    <th>Species_Id</th>
                    <th>Animal Name</th>
                    <th>Scientific Name</th>
                    <th>Category</th>
                    <th>Options</th>
                </tr>
            </table>
        </div>
    </div>
@endsection
