@extends('layouts.level3')
@section('title','Barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Daftar Barang Masuk</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-success" href="/barang/masuk/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
      </div>
      <div class="table-responsive">
        <p><strong>{{ $barangs->total() }} Barang</strong> | Tampil {{ $barangs->count() }} list</p>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Kode Barang</th>
              <th>Nama</th>
              <th>PO/Kwitansi</th>
              <th>Quantitas</th>
              <th>Harga</th>
              <th>Kondisi</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang)
              <tr>
                <td><img src="/images/inventori/{{ $barang->picture }}" alt="" style="max-height:20px;"></td>
                <td>{{ $barang->barang_code }}</td>
                <td>{{ $barang->barang_name }}</td>
                <td>{{ $barang->number }}</td>
                <td>{{ $barang->quantity}}</td>
                <td>{{ number_format($barang->price)}}</td>
                <td>{{ $barang->kondisi_barang_name}}</td>
                <td>
                  <a class="btn-sm btn-primary" href="/barang/masuk/{{$barang->id}}/view"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-warning" href="/barang/masuk/{{$barang->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-danger" href="/barang/masuk/{{$barang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
