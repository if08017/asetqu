@extends('layouts.level3')
@section('title','Management - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <div class="col-sm-6">
        <h5>Jabatan</h5>
        <div class="table-responsive">
          <table class="table table-condensed table-hover">
            <tr>
              <td>
                <form action="/management/jabatan/insert" method="POST">
                  {{ csrf_field() }}
                  <input type="text" class="form-control input-sm" id="text" name="name" placeholder="Ketikkan nama jabatan" required>
              </td>
              <td>
                  <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
                </form>
              </td>
            </tr>
          </table>
          <p><strong>Total : {{ $jabatans->total() }} data</strong> | Tampil {{ $jabatans->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Jabatan</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jabatans as $jabatan)
                <tr>
                  <td>{{ $jabatan->id }}</td>
                  <td>{{ $jabatan->name }}</td>
                  <td>
                    <a class="btn btn-xs btn-warning" href="/management/jabatan/{{$jabatan->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-xs btn-danger" href="/management/jabatan/{{$jabatan->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
            {{$jabatans->links()}}
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <h5>Ruangan</h5>
        <div class="table-responsive">
          <table class="table table-condensed table-hover">
            <tr>
              <td>
                <form action="/management/ruangan/insert" method="POST">
                  {{ csrf_field() }}
                  <input type="text" class="form-control input-sm" id="text" name="name" placeholder="Ketikkan nama ruangan" required>
              </td>
              <td>
                  <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
                </form>
              </td>
            </tr>
          </table>
          <p><strong>Total : {{ $ruangans->total() }} data</strong> | Tampil {{ $ruangans->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Ruangan</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ruangans as $ruangan)
                <tr>
                  <td>{{ $ruangan->id }}</td>
                  <td>{{ $ruangan->name }}</td>
                  <td>
                    <a class="btn btn-xs btn-warning" href="/management/ruangan/{{$ruangan->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-xs btn-danger" href="/management/ruangan/{{$ruangan->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
            {{$ruangans->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
