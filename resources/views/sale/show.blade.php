@extends('layouts.app')
 
@section('content')
@include('layouts.headers.cards')
<div class="row">
<div class="col">
          <div class="card bg-default shadow">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-white mb-0">Sales</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('sales.index') }}" class="nav-link py-2 px-3 active" >BACK</a>
              </div>
            </div>
           </div>
   
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Amount</strong>
            {{$sales ->amount}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Price</strong>
            {{$sales ->price}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Sales date</strong>
            {{$sales ->sales_date}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Sales status</strong>
            {{$sales ->sales_status}}
            </div>
        </div>
</div>
    @include('layouts.footers.auth')
@endsection