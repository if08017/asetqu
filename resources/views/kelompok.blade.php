@extends('layouts.level3')
@section('title','Kelompok - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <div class="col-sm-6">
        <h5>Daftar Kelompok Barang</h5>
        <div class="table-responsive">
          <table class="table table-condensed table-hover">
            <tr>
              <form action="/barang/kelompok/insert" method="POST">
                {{ csrf_field() }}
                <td class="kecil">
                    <input type="number" class="form-control input-sm small" id="text" name="code" placeholder="Kode" required>
                </td>
                <td>
                    <input type="text" class="form-control input-sm" id="text" name="name" placeholder="nama kelompok barang" required>
                </td>
                <td class="kecil">
                  <select class="from-control" id="sel1" name="bidang" required>
                    <option value="">Pilih bidang kerja</option>
                    <optgroup label="---">
                      @foreach($bidangs as $bidang)
                        <option value="{{ $bidang->id }}">{{ $bidang->name }}</option>
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
          <p><strong>Total : {{ $kelompokbarangs->total() }} list</strong> | Tampil {{ $kelompokbarangs->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Kelompok</th>
                <th>Bidang Barang</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kelompokbarangs as $kelompokbarang)
                <tr>
                  <td>{{ $kelompokbarang->code }}</td>
                  <td>{{ $kelompokbarang->name }}</td>
                  <td>{{ $kelompokbarang->bidang_barang_name }}</td>
                  <td>
                    <a class="btn btn-xs btn-warning" href="/barang/kelompok/{{$kelompokbarang->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-xs btn-danger" href="/barang/kelompok/{{$kelompokbarang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="col-sm-12 text-center">
            {{$kelompokbarangs->links()}}
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <h5>Daftar Sub Kelompok Barang</h5>
        <div class="table-responsive">
          <table class="table table-condensed table-hover">
            <tr>
              <form action="/barang/subkelompok/insert" method="POST">
                {{ csrf_field() }}
                <td class="kecil">
                  <input type="number" class="form-control input-sm" id="text" name="code" placeholder="Kode" required>
                </td>
                <td>
                  <input type="text" class="form-control input-sm" id="text" name="name" placeholder="nama sub kelompok barang" required>
                </td>
                <td class="kecil">
                  <select class="from-control" id="sel1" name="kelompok" required>
                    <option value="">Pilih kelompok kerja</option>
                    <optgroup label="---">
                      @foreach($kelompokbarangs2 as $kelompokbarang2)
                        <option value="{{ $kelompokbarang2->id }}">{{ $kelompokbarang2->name }}</option>
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
          <p><strong>Total : {{ $subkelompokbarangs->total() }} list</strong> | Tampil {{ $subkelompokbarangs->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Sub Kelompok Barang</th>
                <th>Kelompok Barang</th>
                <!-- <th>Status</th> -->
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subkelompokbarangs as $subkelompokbarang)
                <tr>
                  <td>{{ $subkelompokbarang->code }}</td>
                  <td>{{ $subkelompokbarang->name }}</td>
                  <td>{{ $subkelompokbarang->kelompok_barang_name }}</td>
                  <td>
                    <a class="btn btn-xs btn-warning" href="/barang/subkelompok/{{$subkelompokbarang->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-xs btn-danger" href="/barang/subkelompok/{{$subkelompokbarang->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="col-sm-12 text-center">
            {{$subkelompokbarangs->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
