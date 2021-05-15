@extends('layouts.app')
 
@section('content')
@include('layouts.headers.cards')
 <!-- Dark table -->
 <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="text-white mb-0">Categories</h2>
            </div>
            <div class="col">
              <div class="nav nav-pills justify-content-end">
                <a href="{{ route('categories.create') }}" class="nav-link py-2 px-3 active" >Create New Category</a>
              </div>
            </div>
           </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="name">Name</th> 
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($data as $key => $value)
        <tr>
        <td>{{ ++$i }}</td>
                        <td>{{ $value->category_name }}</td>
                        <td>
                        <form action="{{ route('categories.destroy',$value->id) }}" method="POST">   
                        <a class="btn btn-info" href="{{ route('categories.show',$value->id) }}">Show</a>    
                        <a class="btn btn-primary" href="{{ route('categories.edit',$value->id) }}">Edit</a>   
                        @csrf
                        @method('DELETE')      
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
        </tr>
        @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @include('layouts.footers.auth')
@endsection




























    