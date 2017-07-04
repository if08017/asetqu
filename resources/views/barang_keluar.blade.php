@extends('layouts.level3')
@section('title','Barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Daftar Barang Keluar</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-success" href="/barang/keluar/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
      </div>
      <div class="table-responsive">
        <p><strong>{{ $barangs->total() }} Barang</strong> | Tampil {{ $barangs->count() }} list</p>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama</th>
              <th>Quantitas</th>
              <th>Pegawai</th>
              <th>Ruangan</th>
              <th>Kondisi</th>
              <th>Status</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang)
              <tr>
                <td>{{ $barang->barang_code }}</td>
                <td>{{ $barang->barang_name }}</td>
                <td>{{ $barang->quantity }}</td>
                <td>{{ $barang->pegawai_name}}</td>
                <td>{{ $barang->ruangan_name}}</td>
                <td>{{ $barang->kondisi_barang_name}}</td>
                <td>{{ $barang->status_mutasi_name }}</td>
                <td>
                  <a class="btn-sm btn-warning" href="/barang/keluar/{{$barang->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-danger" href="/barang/keluar/{{$barang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-sm-12 text-center">
          {{$barangs->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
