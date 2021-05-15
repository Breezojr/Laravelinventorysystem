@extends('layouts.app')
 
@section('content')
@include('layouts.headers.cards')
<div class="row">
<div class="col">
          <div class="card bg-default shadow">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-white mb-0">Categories</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('categories.index') }}" class="nav-link py-2 px-3 active" >BACK</a>
              </div>
            </div>
           </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $category->category_name }}
            </div>
        </div>
        
    </div>
</div>
    @include('layouts.footers.auth')
@endsection