@extends('layouts.level3')
@section('title','Barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Daftar Barang Habis Pakai</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-success" href="/bhp/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
      </div>
      <div class="table-responsive">
        <p><strong>{{ $barangs->total() }} Barang</strong> | Tampil {{ $barangs->count() }} list</p>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>No Kwitansi</th>
              <th>Nama</th>
              <th>Quantitas</th>
              <th>Mutasi</th>
              <th>PIC</th>
              <th>Harga</th>
              <th>Total</th>
              <th>Tanggal</th>
              <th>Rincian</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang)
              <tr>
                <td>{{ $barang->barang_code }}</td>
                <td>{{ $barang->kwitansi_id }}</td>
                <td>{{ $barang->barang_name }}</td>
                <td>{{ $barang->quantity.' '.$barang->satuan_name }}</td>
                <td>{{ $barang->mutation_name }}</td>
                <td>{{ $barang->pegawai_name }}</td>
                <td>{{ number_format($barang->price) }}</td>
                <td>{{ number_format($barang->sum) }}</td>
                <td>{{ $barang->created_at->format('d-m-Y') }}</td>
                <td>
                  <a class="btn-sm btn-primary" href="/barang/{{$barang->id}}/view"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                </td>
                <td>
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
