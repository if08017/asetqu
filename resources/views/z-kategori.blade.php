@extends('layouts.level3')
@section('title','Kategori - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Daftar Kategori</h5>
      <p><strong>Total : {{ $kategoris->total() }} list</strong></p>
      <div class="text-right">
        <a class="btn btn-sm btn-success" href="/kategori/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
      </div>
      <div class="table-responsive">
        <p>Tampil {{ $kategoris->count() }} list</p>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th>Kode Kategori</th>
              <th>Nama Kategori</th>
              <th>Golongan</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kategoris as $kategori)
              <tr>
                <td>{{ $kategori->code }}</td>
                <td>{{ $kategori->name }}</td>
                <td>{{ $kategori->golongan_name }}</td>
                <td>{{ $kategori->created_at->format('Y-m-d')}}</td>
                <td>
                  @if(($kategori->status) == 'on')
                    <span class="btn-sm btn-info">Aktif</span>
                  @else
                    <span class="btn-sm btn-default">Tidak aktif</span>
                  @endif
                </td>
                <td>
                  <a class="btn-sm btn-warning" href="/kategori/{{$kategori->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn-sm btn-danger" href="/kategori/{{$kategori->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-sm-12 text-center">
          {{$kategoris->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection
