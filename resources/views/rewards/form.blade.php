
@section('meta')
<!--<meta name="products" content="{{$products}}">-->
@endsection

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

<form id="reward_form" action="/rewards" method="POST">

{!!Form::token()!!}

<div class="col-lg-4 col-lg-offset-1">            
    <div class="form-group">
        <label class="control-label">Reward Condition:</label>
        <select class="form-control" name="reward_condition" >                        
        </select>
    </div>
    <div class="reward_condition_fields">
        <div class="form-group condition_product_id_container">
            <label class="control-label">Product:</label>
            <select class="form-control" name="condition_product_id">
                <option value="" disabled></option>
                @foreach($products AS $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Condition:</label>
            <select class="form-control" name="condition" readonly>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Condition Value:</label>
            <input class="form-control" name="condition_value">                    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Reward Type:</label>
        <select class="form-control" name="reward_type" >                        
        </select>
    </div>
    <div class="form-group">
        <label class="control-label">Reward Text:</label>
        <input class="form-control" name="reward">
        </select>
    </div>
    <div id="reward_value_container" class="form-group">           
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        <label class="control-label">Valid From:</label>
        <input type="text" class="form-control datetimepicker" name="valid_from">
    </div>
    <div class="form-group">
        <label class="control-label">Valid Until:</label>
        <input type="text" class="form-control datetimepicker" name="valid_until">
    </div>
</div>

<div class="form-group">
    <div class="col-lg-2 col-lg-offset-7">
        <div class="right">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/rewards" class="btn btn-default">Back</a>
        </div>
    </div>
</div>

</form>

<script id="reward_value_text_template" type="text/html">
    <label class="control-label">Discount Amount: </label>
    <input class="form-control" name="reward_value">
</script>

<script id="reward_value_products_template" type="text/html">
    <label class="control-label">Free Product:</label>
    <select class="form-control" name="reward_value">
        <option value="" disabled></option>
        @foreach($products AS $product)
        <option value="{{$product->id}}">{{$product->name}}</option>
        @endforeach
    </select>
</script>