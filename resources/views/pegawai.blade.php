@extends('layouts.level3')
@section('title','Barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Daftar Pegawai</h5>
      <p><strong>Total : {{ $pegawais->total() }} list</strong></p>
      <div class="text-right">
        <a class="btn btn-sm btn-success" href="/pegawai/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
      </div>
      <div class="table-responsive">
        <p>Tampil {{ $pegawais->count() }} list</p>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Kontact</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Jabatan</th>
              <th>Rincian</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pegawais as $pegawai)
              <tr>
                <td>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->name }}</td>
                <td>{{ $pegawai->contact }}</td>
                <td>{{ $pegawai->email }}</td>
                <td>{{ $pegawai->address }}</td>
                <td>{{ $pegawai->jabatan_name }}</td>
                <td>
                  <a class="btn-sm btn-primary" href="/pegawai/{{$pegawai->id}}/view"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                </td>
                <td>
                  <a class="btn-sm btn-warning" href="/pegawai/{{$pegawai->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-danger" href="/pegawai/{{$pegawai->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-sm-12 text-center">
          {{$pegawais->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
