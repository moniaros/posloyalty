@extends('layouts.master')

@section('meta')
<meta name="reward_conditions" content="width=device-width, initial-scale=1">
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