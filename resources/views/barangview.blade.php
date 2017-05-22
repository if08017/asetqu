@extends('layouts.level3')
@section('title','View barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Rincian barang dengan kode {{$barang->code}}</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-primary" href="/barang"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>kembali</a>
        <a class="btn btn-sm btn-success" href="/barang"><span class="glyphicon glyphicon-export" aria-hidden="true"></span>export PDF</a>
        <a class="btn btn-sm btn-warning" href="/barang/{{$barang->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>edit</a>
        <a class="btn btn-sm btn-danger" href="/barang/{{$barang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>delete</a>
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
            <tr> <td>Kode</td> <td>{{$barang->code}}</td> </tr>
            <tr> <td>Nama</td> <td>{{$barang->name}}</td> </tr>
            <tr> <td>Kuantitas</td> <td>{{$barang->quantity}}</td> </tr>
            <tr> <td>Satuan</td> <td>{{$barang->satuan_name}}</td> </tr>
            <tr> <td>Kondisi</td> <td>{{$barang->kondisi_name}}</td> </tr>
            <tr> <td>Status</td> <td>{{$barang->status_name}}</td> </tr>
            <tr> <td>Ruangan</td> <td>{{$barang->ruangan_name}}</td> </tr>
            <tr> <td>Golongan</td> <td>{{$barang->golongan_barang_name}}</td> </tr>
            <tr> <td>Bidang</td> <td>{{$barang->bidang_barang_name}}</td> </tr>
            <tr> <td>Kelompok</td> <td>{{$barang->kelompok_barang_name}}</td> </tr>
            <tr> <td>Sub Kelompok</td> <td>{{$barang->sub_kelompok_barang_name}}</td> </tr>
            <tr> <td>Pemegang / PIC</td> <td>{{$barang->pegawai_name}}</td> </tr>
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
            <tr> <td>Deskripsi</td> <td>{{$barang->description}}</td> </tr>
            <tr> <td>Harga</td> <td>{{$barang->price}}</td> </tr>
            <tr> <td>Nomor</td> <td>{{$barang->number}}</td> </tr>
            <tr> <td>Sumber</td> <td>{{$barang->source}}</td> </tr>
            <tr> <td>Ukuran</td> <td>{{$barang->size}}</td> </tr>
            <tr> <td>Merek</td> <td>{{$barang->brand}}</td> </tr>
            <tr> <td>Warna</td> <td>{{$barang->color}}</td> </tr>
            <tr> <td>Bahan</td> <td>{{$barang->material}}</td> </tr>
            <tr> <td>Tahun Pembuatan</td> <td>{{$barang->year_created}}</td> </tr>
            <tr> <td>Tahun Beli</td> <td>{{$barang->year_buy}}</td> </tr>
            <tr> <td>Tanggal Input</td> <td>{{$barang->created_at}}</td> </tr>
            <tr> <td>Tanggal Perubahan</td> <td>{{$barang->updated_at}}</td> </tr>
            <tr> <td>Tanggal Serahterima</td> <td>{{$barang->receipt_date}}</td> </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
