@extends('layouts.master')

@section('content')
<div class="container-fluid">    
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h4>Customers</h4>
        </div>        
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Location</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Device Id</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach($customers AS $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->contact_number}}</td>
                        <td>{{$customer->location}}</td>
                        <td>{{$customer->gender}}</td>
                        <td>{{$customer->birtd_date}}</td>
                        <td>{{$customer->device_id}}</td>
                        <td></td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>
</div
@endsection