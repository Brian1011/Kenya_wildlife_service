<?php
/**
 * Created by PhpStorm.
 * User: Brian Mutinda
 * Date: 11/12/2018
 * Time: 05:18 PM
 */?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="text-center">All Mammals Information</h1>
                </div>

                <div class="panel-body">
                    <div class="col-lg-12">
                        <table class="table table-hover">
                            <tr class="success">
                                <th>Record Id</th>
                                <th>Mammal Name</th>
                                <th>Location </th>
                                <th>Year From</th>
                                <th>Year To</th>
                                <th>Population</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>

                            @foreach($mammals as $mammal)
                                <tr>
                                    <td>{{$mammal->record_id}}</td>
                                    <td>{{$mammal->mammal_name}}</td>
                                    <td>{{$mammal->location}}</td>
                                    <td>{{$mammal->year_from}}</td>
                                    <td>{{$mammal->year_to}}</td>
                                    <td>{{$mammal->population}}</td>
                                    <td>{{$mammal->status}}</td>
                                    <td>
                                        <a href="#" class="btn btn-success">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            {{$mammals->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
