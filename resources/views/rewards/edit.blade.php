@extends('layouts.master')

@section('meta')
@if ($reward)
<meta name="reward" content="{{$reward}}">
@else
<meta name="reward" content="{}">
@endif

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('rewards.form')
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('/js/constants/rewards.js') }}"></script>
<script src="{{ asset('/js/select_utilities.js') }}"></script>
<script src="{{ asset('/js/reward_fields.js') }}"></script>
@endsection