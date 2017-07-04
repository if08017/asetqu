@extends('layouts.level3')
@section('title','View barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Rincian barang dengan kode {{$barang->barang_code}}</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-primary" href="/barang/masuk"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>kembali</a>
        <a class="btn btn-sm btn-warning" href="/barang/masuk/{{$barang->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>edit</a>
        <a class="btn btn-sm btn-danger" href="/barang/masuk/{{$barang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>delete</a>
      </div>
      <div class="col-sm-6">
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="col-sm-3">Entitas</th>
              <th class="col-sm-9">Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            <tr> <td>Foto</td> <td><img src="/images/inventori/{{ $barang->picture }}" alt="" style="max-height:50px;"></td> </tr>
            <tr> <td>Kode</td> <td>{{$barang->barang_code}}</td> </tr>
            <tr> <td>Nama</td> <td>{{$barang->barang_name}}</td> </tr>
            <tr> <td>PO/Kwitansi</td> <td>{{$barang->number}}</td> </tr>
            <tr> <td>Deskripsi</td> <td>{{$barang->description}}</td> </tr>
            <tr> <td>Quantitas</td> <td>{{$barang->quantity}}</td> </tr>
            <tr> <td>Harga</td> <td>{{$barang->price}}</td> </tr>
            <tr> <td>Ukuran</td> <td>{{$barang->size}}</td> </tr>
            <tr> <td>Sumber</td> <td>{{$barang->source}}</td> </tr>
            <tr> <td>Warna</td> <td>{{$barang->color}}</td> </tr>
            <tr> <td>Bahan</td> <td>{{$barang->material}}</td> </tr>
            <tr> <td>Tahun pembutan</td> <td>{{$barang->created_year}}</td> </tr>
            <tr> <td>Tahun pembelian</td> <td>{{$barang->buy_year}}</td> </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-6">
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="col-sm-3">Entitas</th>
              <th class="col-sm-9">Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            <tr> <td>Golongan</td> <td>{{$barang->golongan_barang_name}}</td> </tr>
            <tr> <td>Bidang</td> <td>{{$barang->bidang_barang_name}}</td> </tr>
            <tr> <td>Kelompok</td> <td>{{$barang->kelompok_barang_name}}</td> </tr>
            <tr> <td>Sub kelompok</td> <td>{{$barang->sub_kelompok_barang_name}}</td> </tr>
            <tr> <td>Merek</td> <td>{{$barang->barang_brand}}</td> </tr>
            <tr> <td>Tanggal pembuatan</td> <td>{{$barang->created_at}}</td> </tr>
            <tr> <td>Tanggal perubahaan</td> <td>{{$barang->updated_at}}</td> </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
