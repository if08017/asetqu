@extends('layouts.level3')
@section('title','Golongan - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <div class="col-sm-6">
        <h5>Daftar Golongan Barang</h5>
        <div class="table-responsive">
          <table class="table table-condensed table-hover">
            <tr>
              <form action="/barang/golongan/insert" method="POST">
                {{ csrf_field() }}
                <td>
                    <input type="number" class="form-control input-sm" id="text" name="code" placeholder="kode" required>
                </td>
                <td>
                    <input type="text" class="form-control input-sm" id="text" name="name" placeholder="nama golongan barang" required>
                </td>
                <td>
                    <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
                </td>
              </form>
            </tr>
          </table>
          <p><strong>Total : {{ $golongans->total() }} list</strong> | Tampil {{ $golongans->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Golongan</th>
                <!-- <th>Status</th> -->
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($golongans as $golongan)
                <tr>
                  <td>{{ $golongan->code }}</td>
                  <td>{{ $golongan->name }}</td>
                  <!-- <td>
                    @if(($golongan->status) == 'on')
                      <span class="btn-sm btn-info">Aktif</span>
                    @else
                      <span class="btn-sm btn-default">Tidak aktif</span>
                    @endif
                  </td> -->
                  <td>
                    <a class="btn-sm btn-warning" href="/barang/golongan/{{$golongan->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn-sm btn-danger" href="/barang/golongan/{{$golongan->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="col-sm-12 text-center">
            {{$golongans->links()}}
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <h5>Daftar Bidang Barang</h5>
        <div class="table-responsive">
          <table class="table table-condensed table-hover">
            <tr>
              <form action="/barang/bidang/insert" method="POST">
                {{ csrf_field() }}
                <td>
                  <input type="number" class="form-control input-sm" id="text" name="code" placeholder="kode" required>
                </td>
                <td>
                  <input type="text" class="form-control input-sm" id="text" name="name" placeholder="nama bidang barang" required>
                </td>
                <td>
                  <select class="from-control" id="sel1" name="golongan" required>
                    <option value="">Pilih golongan kerja</option>
                    <optgroup label="---">
                      @foreach($golongans2 as $golongan2)
                        <option value="{{ $golongan2->id }}">{{ $golongan2->name }}</option>
                      @endforeach
                    </optgroup>
                  </select>
                </td>
                <td>
                  <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
                </td>
              </form>
            </tr>
          </table>
          <p><strong>Total : {{ $bidangs->total() }} list</strong> | Tampil {{ $bidangs->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Bidang Barang</th>
                <th>Gologan</th>
                <!-- <th>Status</th> -->
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bidangs as $bidang)
                <tr>
                  <td>{{ $bidang->code }}</td>
                  <td>{{ $bidang->name }}</td>
                  <td>{{ $bidang->golongan_barang_name }}</td>
                  <!-- <td>
                    @if(($bidang->status) == 'on')
                      <span class="btn-sm btn-info">Aktif</span>
                    @else
                      <span class="btn-sm btn-default">Tidak aktif</span>
                    @endif
                  </td> -->
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
