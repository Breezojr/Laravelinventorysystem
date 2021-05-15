@extends('layouts.app')
 
@section('content')
@include('layouts.headers.cards')
<div class="row">
<div class="col">
          <div class="card bg-default shadow">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-white mb-0">Order</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('orders.index') }}" class="nav-link py-2 px-3 active" >BACK</a>
              </div>
            </div>
           </div>
   
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Order date:</strong>
            {{$order->order_date}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Required date</strong>
            {{$order->required_date}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Shipped date</strong>
            {{$order->shipped_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Order status</strong>
            {{$order->order_status}
            </div>
        </div>
</div>
    @include('layouts.footers.auth')
@endsection