@extends('layouts.master')

@section('css')
<link href="{{ asset('/css/sidebar.css') }}" rel="stylesheet">

<style>

    .empty-image-container {
        width: 270px;
        height: 400px;
        border: 1px solid #d9d9d9;
        text-align: center;
        vertical-align: auto;
    }

</style>

@endsection

@section('content')

<!--main-->
<div class="container">
    <div class="row">

        <div class="col-md-5">
            <form action="/promo" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Tip: *Please use images in portrait for better visibility on client phones.</label>
                    <br>
                    <label>*It is recommended to upload images with lower file size as possible.</label>
                    <input type="file" name="promo_image">
                </div>

                <div class="form-group">
                    <label>Advertisement Text (Will Appear on customer phones):</label>
                    <textarea class="form-control" name="description">{{$promo->description}}</textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Promo</button>
                </div>
            </form>
        </div>

        <div class="col-md-7">
            @if($promo)
            <img src="{{$promo->image_file}}" height="400">
            @else
            <div class="empty-image-container">
                Please upload portrait images
            </div>
            @endif
        </div>

    </div><!--/row-->
</div>

@endsection