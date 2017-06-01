@extends('layouts.level3')
@section('title','View barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Rincian barang dengan kode {{$barang->code}}</h5>
      <div class="text-right">
        <a class="btn btn-sm btn-primary" href="/barang"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>kembali</a>
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
            <tr> <td>Deskripsi</td> <td>{{$barang->description}}</td> </tr>
            <tr> <td>Sub Kelompok</td> <td>{{$barang->sub_kelompok_barang_name}}</td> </tr>
            <tr> <td>Tanggal pembuatan</td> <td>{{$barang->created_at}}</td> </tr>
            <tr> <td>Tanggal perubahaan</td> <td>{{$barang->updated_at}}</td> </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-6">&nbsp;</div>
    </div>
</div>
@endsection
