@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h4>Stores</h4>
        </div>
        <div class="col-md-2">
            <a href="/stores/create" type="button" class="btn btn-success" style="float:right" data-toggle="modal">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Device Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stores AS $store)

                    <tr>
                        <td>{{$store->device_id}}</td>
                        <td>{{$store->name}}</td>
                        <td>{{$store->created_at}}</td>
                        <td>{{$store->updated_at}}</td>
                        <td>
                            <a href="/stores/{{$store->id}}/edit">Edit</a>
                        </td>
                        <td>
                            <a href="/stores/{{$store->id}}/delete">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div
@endsection