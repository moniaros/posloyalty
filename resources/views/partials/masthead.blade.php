<div id="masthead">  
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="text-align: center">
                <!--<img src="{{asset('/images/contis.jpg')}}" height="96">-->
                <!--<img src="{{asset('/images/laplogo2.png')}}" height="96">-->

                @if ($company->icon)
                <img src="{{asset($company->icon)}}" height="96">
                @else
                <h1>{{$company->name}}</h1>
                @endif                
                @if(count($devices) > 0)
                <p class="lead">{{count($devices)}} retailer device(s) available</p>
                @else
                <p class="lead">No devices registered to your company yet</p>
                @endif                
            </div>
            <div class="col-md-8">
                <br>
                <table>
                    <tr>
                        <td><b>Transactions Today: </b></td>                        
                        <td>&nbsp;{{$company->transactionCountToday()}}</td>
                    </tr>
                    <tr>
                        <td><b>Transactions Within the Past 7 Days: </b></td>                        
                        <td>&nbsp;{{$company->transactionCountPast7Days()}}</td>
                    </tr>
                </table>

                <div class="alerts">
                    @if(Session::has('success'))
                    <div class="alert-box success">
                        <div class="alert alert-success" role="alert">{!! Session::get('success') !!}</div>                
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">{!! Session::get('error') !!}</div>            
                    @endif
                </div>

                @if(isset($enable_generate_all))
                <div class="form-group">
                    <button id="action-generate-report-all" class="btn btn-success">Generate Report (All Devices)</button>
                </div>
                @endif
                
            </div>
        </div> 
    </div>
</div>
<hr>