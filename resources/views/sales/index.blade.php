@extends('layouts.master')

@section('content')
<div class="container-fluid">    
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h4>Sales</h4>
        </div>
        <div class="col-md-2">
            <a href="/sales/export" target="_blank" type="button" class="btn btn-success" style="float:right" data-toggle="modal">
                <i class="glyphicon glyphicon-download-alt"></i>
                Get Report
            </a>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Store</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Discount</th>
                        <th>Customer</th>
                        <th></th>                        
                    </tr>
                </thead>
                <tbody> 
                    @foreach($salesList AS $salesTransaction)
                    <tr>
                        <td>{{$salesTransaction->store->name}}</td>
                        <td>{{$salesTransaction->transaction_date}}</td>
                        <td>{{$salesTransaction->amount}}</td>
                        <td>{{$salesTransaction->total_discount}}</td>
                        @if ($salesTransaction->customer)
                        <td>{{$salesTransaction->customer->name}}</td>
                        @else
                        <td>Not registered</td>                        
                        @endif                        
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div
@endsection