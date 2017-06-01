@extends('layouts.level3')
@section('title','View barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Rincian barang dengan kode {{$inventori->code}}</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-primary" href="/inventori"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>kembali</a>
        <a class="btn btn-sm btn-warning" href="/inventori/{{$inventori->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>edit</a>
        <a class="btn btn-sm btn-danger" href="/inventori/{{$inventori->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>delete</a>
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
            <tr><td>Gambar</td><td><img src="/images/inventori/{{ $inventori->picture }}" alt="" style="max-height:50px;"></td>
            </tr>
            <tr> <td>Kode</td> <td>{{$inventori->barang_code}}</td> </tr>
            <tr> <td>Nama</td> <td>{{$inventori->name}}</td> </tr>
            <tr> <td>Kuantitas</td> <td>{{$inventori->quantity}}</td> </tr>
            <tr> <td>Satuan</td> <td>{{$inventori->satuan_name}}</td> </tr>
            <tr> <td>Kondisi</td> <td>{{$inventori->kondisi_name}}</td> </tr>
            <tr> <td>Status</td> <td>{{$inventori->status_name}}</td> </tr>
            <tr> <td>Ruangan</td> <td>{{$inventori->ruangan_name}}</td> </tr>
            <tr> <td>Golongan</td> <td>{{$inventori->golongan_barang_name}}</td> </tr>
            <tr> <td>Bidang</td> <td>{{$inventori->bidang_barang_name}}</td> </tr>
            <tr> <td>Kelompok</td> <td>{{$inventori->kelompok_barang_name}}</td> </tr>
            <tr> <td>Sub Kelompok</td> <td>{{$inventori->sub_kelompok_barang_name}}</td> </tr>
            <tr> <td>Pemegang / PIC</td> <td>{{$inventori->pegawai_name}}</td> </tr>
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
            <tr> <td>Nomor PO / Kuitansi</td> <td>{{$inventori->number}}</td> </tr>
            <tr> <td>Deskripsi</td> <td>{{$inventori->description}}</td> </tr>
            <tr> <td>Harga</td> <td>Rp. {{number_format($inventori->price)}}</td> </tr>
            <tr> <td>Sumber</td> <td>{{$inventori->source}}</td> </tr>
            <tr> <td>Ukuran</td> <td>{{$inventori->size}}</td> </tr>
            <tr> <td>Merek</td> <td>{{$inventori->brand}}</td> </tr>
            <tr> <td>Warna</td> <td>{{$inventori->color}}</td> </tr>
            <tr> <td>Bahan</td> <td>{{$inventori->material}}</td> </tr>
            <tr> <td>Tahun Pembuatan</td> <td>{{$inventori->created_year}}</td> </tr>
            <tr> <td>Tahun Beli</td> <td>{{$inventori->buy_year}}</td> </tr>
            <tr> <td>Tanggal Input</td> <td>{{$inventori->created_at}}</td> </tr>
            <tr> <td>Tanggal Perubahan</td> <td>{{$inventori->updated_at}}</td> </tr>
            <tr> <td>Tanggal Serahterima</td> <td>{{$inventori->receipt_date}}</td> </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
