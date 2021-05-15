@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')

<div class="row">
  <div class="col">
   <div class="card ">
    <div class="row align-items-center">
     <div class="col">
       <h2 class="text-black mb-0">Edit Store</h2>
    </div>
 <div class="col">
  <div class="nav nav-pills justify-content-end">
    <a href="{{ route('stores.index') }}" class="nav-link py-2 px-3 active" >Back</a>
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
   
<form action="{{ route('stores.update',$store->id) }}" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="store_name" class="form-control" value="{{ $store->store_name }}" placeholder="Edit Name of Store">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>phone no:</strong>
                <input type="text" name="store_phone" class="form-control"  value="{{ $store->store_phone}}" placeholder="Phone No:">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="store_email" class="form-control" value="{{ $store->store_email }}" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Street:</strong>
                <input type="text" name="store_street" class="form-control" value="{{ $store->store_street }}" placeholder="Street">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City</strong>
                <input type="text" name="store city" class="form-control" value="{{ $store->store_city }}" placeholder="City">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country</strong>
                <input type="text" name="store_state" class="form-control" value="{{ $store->store_state }}" placeholder="Country">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection