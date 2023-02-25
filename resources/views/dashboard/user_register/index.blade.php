@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List User Register</h1>
  </div>    

  <div class="table-responsive col-lg-8">
    <a href="#" class="btn btn-primary mb-3">Send Email Reminder</a>
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
        @forelse($users_registers as $user)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['phone'] }}</td>            
            </tr>             
        @empty
         <tr> <td colspan="4"><p class="text-center">Data belum ada</p></td></tr>
        @endforelse 
      </tbody>
    </table>
  </div>
@endsection