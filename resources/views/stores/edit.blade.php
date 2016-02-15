
@extends('layouts.master')


@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-4 col-lg-offset-1">
            @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <form id="reward_form" action="/stores/{{$store->id}}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            {!!Form::token()!!}

            <div class="col-lg-4 col-lg-offset-1">
                <div class="form-group">
                    <label class="control-label">Registered Device Id</label>
                    <br>
                    @if($store->device_id)
                    <span>{{$store->device_id}}</span>
                    <!--<button class="btn btn-link">Unregister Device</button>-->
                    @else
                    <span>Not yet registered to a device</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" name="name" value="{{$store->name}}">
                </div>
                <div class="right">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/stores" class="btn btn-default">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
