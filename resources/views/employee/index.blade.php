@extends('layouts.app')
 
@section('content')
@include('layouts.headers.cards')
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Employee </h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">employee</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Employee</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('employees.create') }}" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Employee details
              </h3>
            </div>
 <!-- Dark table -->

            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="name">First Name</th>
                    <th scope="col" class="sort" data-sort="name">Last name</th>
                    <th scope="col" class="sort" data-sort="name">Phone no</th>
                    <th scope="col" class="sort" data-sort="name">Email</th>
                    <th scope="col" class="sort" data-sort="name">Department</th>
                    <th scope="col" class="sort" data-sort="name">City</th>
                    <th scope="col" class="sort" data-sort="name">Country</th>
                    <th scope="col" class="sort" data-sort="name">Date hired</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->first_name }}</td>
            <td>{{ $value->last_name }}</td>
            <td>{{ $value->phone }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->department }}</td>
            <td>{{ $value->city }}</td>
            <td>{{ $value->country }}</td>
            <td>{{ $value->hired_date }}</td>
            <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="{{ route('employees.show',$value->id) }}">Show</a>
                          <a class="dropdown-item" href="{{ route('employees.edit',$value->id) }}">Edit</a>
                          <form action="{{ route('employees.destroy',$value->id) }}" method="POST">
                          @csrf
                          @method('DELETE')  
                          <button type="submit" class="dropdown-item">Delete</button>
                          </form>
                        </div>
                      </div>
                    </td>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @include('layouts.footers.auth')
@endsection