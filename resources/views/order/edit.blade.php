@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')
<div class="row">
<div class="col">
          <div class="card ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-black mb-0">Edit Order</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('orders.index') }}" class="nav-link py-2 px-3 active" >Back</a>
              </div>
            </div>
           </div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('orders.store') }}" method="POST">
    @csrf


    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
        <label class="col-md-4 control-label">Customer name</label>
            <div class="col-md-6">
            <select class="form-control js-country" name="customer_id">
             @foreach ($customer  as $customer )
                  <option value="{{$customer ->id}}">{{$customer ->customer_name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>






  
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
        <label class="col-md-4 control-label">Store name</label>
            <div class="col-md-6">
            <select class="form-control js-country" name="store_id">
             @foreach ($store  as $store )
                  <option value="{{$store ->id}}">{{$store ->store_name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>


        


            <div class="form-group">
        <label class="col-md-4 control-label">Employee</label>
            <div class="col-md-6">
            <select class="form-control js-country" name="employee_id">
             @foreach ($employee  as $employee )
                  <option value="{{$employee ->id}}">{{$employee ->employee_name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order date:</strong>
                <input type="text" name="quantity" class="form-control" value="{{$order->order_date}}" placeholder="order date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Required date:</strong>
                <input type="text" name="quantity" class="form-control" value="{{$order->required_date}" placeholder="requireed date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Shipped date:</strong>
                <input type="text" name="quantity" class="form-control" value="{{$order->shipped_date }}" placeholder="shipped date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order status:</strong>
                <input type="text" name="quantity" class="form-control" value="{{$order->order_status}" placeholder="order status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection




























<div class="row">
<div class="col">
          <div class="card ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-black mb-0">Edit Stock</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('stocks.index') }}" class="nav-link py-2 px-3 active" >Back</a>
              </div>
            </div>
           </div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('stocks.update',$stock->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
        <label class="col-md-4 control-label">Store name</label>
            <div class="col-md-6">
            <select class="form-control js-country" name="store_id">
             @foreach ($store  as $store )
                  <option value="{{$store ->id}}">{{$store ->store_name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>



            <div class="form-group">
        <label class="col-md-4 control-label">Product</label>
            <div class="col-md-6">
            <select class="form-control js-country" name="product_id">
             @foreach ($product  as $product )
                  <option value="{{$product ->id}}">{{$product ->name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="text" name="quantity"  value="{{$stock ->quantity}}" class="form-control" placeholder="Enter Quantity">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection