@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')

<div class="row">
  <div class="col">
   <div class="card ">
    <div class="row align-items-center">
     <div class="col">
       <h2 class="text-black mb-0">Store details </h2>
    </div>
 <div class="col">
  <div class="nav nav-pills justify-content-end">
    <a href="{{ route('stores.index') }}" class="nav-link py-2 px-3 active" >Back</a>
     </div>
    </div>
</div>
   

   

  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $store->store_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone no:</strong>
                {{ $store->store_phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $store->store_email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Street:</strong>
                {{ $store->store_street }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                {{ $store->store_city }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country:</strong>
                {{ $store->store_country }}
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')

@endsection