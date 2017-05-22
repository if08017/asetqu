@extends('layouts.level3')
@section('title','Kelola - Asetqu')
@section('content')
      <div class="col-sm-10 content4">
        <div class="col-sm-12">
          <div class="panel panel-danger">
            <div class="panel-heading">Daftar pengguna</div>
            <div class="panel-body">
              @include('kelolaadd')
              <div class="table-responsive report">
                <div class="text-right">
                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
                </div>
                <script type="text/javascript">
                  $('#kelola').on('click', function(){
                    $('#myModal').modal('show');
                  });
                </script>
                <p><strong>{{ $users->total() }} Pengguna</strong> | Tampil {{ $users->count() }} list</p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>
                          <a href="/kelola/{{$user->id}}/edit" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                          <a href="/kelola/{{$user->id}}/delete" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
