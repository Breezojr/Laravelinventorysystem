@extends('layouts.app')
@section('content')
@include('layouts.headers.cards')

<div class="row">
<div class="col">
          <div class="card ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-black mb-0">Edit Category</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('categories.index') }}" class="nav-link py-2 px-3 active" >Back</a>
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
   
<form action="{{ route('categories.update',$category->id) }}" method="POST">
@csrf
@method('PUT')
  
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $category->category_name }}" placeholder="Category">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection



























