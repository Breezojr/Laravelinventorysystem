@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')

<div class="row">
<div class="col">
          <div class="card ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-black mb-0">Add Stock</h2>
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
   
<form action="{{ route('stocks.store') }}" method="POST">
    @csrf
  
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
        <label class="col-md-4 control-label">Store name</label>
            <div class="col-md-6">
            <select class="form-control js-country" name="store_id">
             <option value="-1">Please select Store</option>
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
             <option value="-1">Please select Product</option>
             @foreach ($product  as $product )
                  <option value="{{$product ->id}}">{{$product ->name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection