@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List User Registration</h1>
  </div>    

  @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post['name'] }}</td>
            <td>{{ $post['email'] }}</td>
            <td>{{ $post['phone'] }}</td>            
            </tr>             
        @empty
         <tr> <td colspan="4"><p class="text-center">Data belum ada</p></td></tr>
        @endforelse 
      </tbody>
    </table>
  </div>
@endsection