@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')

<div class="row">
<div class="col">
          <div class="card ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-black mb-0">Create Product</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('products.index') }}" class="nav-link py-2 px-3 active" >Back</a>
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
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf 
    <div class="card-body pt-0 pt-md-4">
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
        <label class="col-md-4 control-label">Category</label>
            <div class="col-md-6">
            <select class="form-control js-country" name="category_id">
             <option value="-1">Please select your category</option>
             @foreach ($catgoo as $catgoo)
                  <option value="{{$catgoo->id}}">{{$catgoo->category_name}}</option>
                         @endforeach
                     </select>
                 </div>
            </div>






        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Name of Product">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Brand Name:</strong>
                <input type="text" name="brand_name" class="form-control" placeholder="Enter Model name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Model Name:</strong>
                <input type="text" name="model_name" class="form-control" placeholder="Enter Model name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Model No:</strong>
                <input type="text" name="model_number" class="form-control" placeholder="Enter Model number">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   </div>
</form>
@endsection