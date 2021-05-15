@extends('layouts.app')
 
@section('content')
@include('layouts.headers.cards')
<div class="row">
<div class="col">
          <div class="card bg-default shadow">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-white mb-0">Product</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('products.index') }}" class="nav-link py-2 px-3 active" >BACK</a>
              </div>
            </div>
           </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $product->quantity }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model_name:</strong>
                {{ $product->model_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model_number:</strong>
                {{ $product->model_number }}
            </div>
        </div>
    </div>
</div>
    @include('layouts.footers.auth')
@endsection