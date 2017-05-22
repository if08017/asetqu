@extends('layouts.level3')
@section('title','Golongan - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <div class="col-sm-5">

      </div>
      <div class="col-sm-7">
        <h5>Daftar Bidang Barang</h5>
        <div class="text-right">
          <a class="btn btn-sm btn-success" href="/barang/bidang/add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</a>
        </div>
        <div class="table-responsive">
          <p><strong>Total : {{ $bidangs->total() }} list</strong> | Tampil {{ $bidangs->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Bidang Barang</th>
                <th>Gologan</th>
                <th>Status</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bidangs as $bidang)
                <tr>
                  <td>{{ $bidang->code }}</td>
                  <td>{{ $bidang->name }}</td>
                  <td>{{ $bidang->golongan_barang_name }}</td>
                  <td>
                    @if(($bidang->status) == 'on')
                      <span class="btn-sm btn-info">Aktif</span>
                    @else
                      <span class="btn-sm btn-default">Tidak aktif</span>
                    @endif
                  </td>
                  <td>
                    <a class="btn-sm btn-warning" href="/barang/bidang/{{$bidang->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn-sm btn-danger" href="/barang/bidang/{{$bidang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="col-sm-12 text-center">
            {{$bidangs->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
