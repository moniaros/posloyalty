@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h4>Points to Reward</h4>
        </div>
        <div class="col-md-2">
            <a href="/rewards/create" type="button" class="btn btn-success" style="float:right" data-toggle="modal">
                <i class="glyphicon glyphicon-plus"></i>
            </a>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Reward Condition</th>
                        <th>Product</th>
                        <th>Condition</th>
                        <th>Condition Value</th>
                        <th>Reward Type</th>
                        <th>Reward Text</th>
                        <th>Reward Value</th>
                        <th>Valid From</th>
                        <th>Valid Until</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rewards AS $reward)

                    <tr>
                        <td>{{$reward->reward_condition}}</td>
                        @if ($reward->condition_product_id)
                        <td>{{$reward->product->name}}</td>
                        @else
                        <td></td>
                        @endif                        
                        <td>{{$reward->condition}}</td>
                        <td>{{$reward->condition_value}}</td>
                        <td>{{$reward->reward_type}}</td>
                        <td>{{$reward->reward}}</td>
                        <td>{{$reward->reward_value}}</td>
                        <td>{{$reward->valid_from}}</td>
                        <td>{{$reward->valid_until}}</td>
                        <td>
                            <a href="/rewards/{{$reward->id}}/edit">Edit</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection