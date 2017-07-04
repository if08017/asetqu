@extends('layouts.level3')
@section('title','Barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Daftar Barang</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-success" href="/barang/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
      </div>
      <div class="table-responsive">
        <p><strong>{{ $barangs->total() }} Barang</strong> | Tampil {{ $barangs->count() }} list</p>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama</th>
              <th>Stok</th>
              <th>Keluar</th>
              <th>Sisa</th>
              <th>Golongan</th>
              <th>Status</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang)
              <tr>
                <td>{{ $barang->code }}</td>
                <td>{{ $barang->name }}</td>
                <td>{{ $barang->in_stock}}</td>
                <td>{{ $barang->out_stock }}</td>
                <td>{{ $barang->in_stock - $barang->out_stock }}</td>
                <td>{{ $barang->golongan_barang_name }}</td>
                <td>{{ $barang->status_name }}</td>
                <td>
                  <a class="btn-sm btn-primary" href="/barang/{{$barang->id}}/view"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-warning" href="/barang/{{$barang->id}}/{{$barang->golongan_barang_id}}/{{$barang->bidang_barang_id}}/{{$barang->kelompok_barang_id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-danger" href="/barang/{{$barang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
