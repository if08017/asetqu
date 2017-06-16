@extends('layouts.level3')
@section('title','Inventori Barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Daftar Inventori Barang</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-success" href="/inventori/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
      </div>
      <div class="table-responsive">
        <p><strong>{{ $inventoris->total() }} Barang</strong> | Tampil {{ $inventoris->count() }} list</p>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>Gambar</th>
              <th>Kode Barang</th>
              <th>PO/Kuitansi</th>
              <th>Nama</th>
              <th>Deskripsi</th>
              <th>Kuantitas</th>
              <th>Harga</th>
              <th>Kondisi</th>
              <th>Pembuatan</th>
              <th>Pembelian</th>
              <th>Rincian</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($inventoris as $inventori)
              <tr>
                <td><img src="/images/inventori/{{ $inventori->picture }}" alt="" style="max-height:20px;"></td>
                <td>{{ $inventori->barang_code }}</td>
                <td>{{ $inventori->number }}</td>
                <td>{{ $inventori->barang_name }}</td>
                <td>{{ $inventori->description }}</td>
                <td>{{ $inventori->quantity }}</td>
                <td>{{ 'Rp.'.number_format($inventori->price) }}</td>
                <td>{{ $inventori->kondisi_name }}</td>
                <td>{{ $inventori->created_year }}</td>
                <td>{{ $inventori->buy_year }}</td>
                <td>
                  <a class="btn-sm btn-primary" href="/inventori/{{$inventori->id}}/view"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                </td>
                <td>
                  <a class="btn-sm btn-warning" href="/inventori/{{$inventori->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-danger" href="/inventori/{{$inventori->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-sm-12 text-center">
          {{$inventoris->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
