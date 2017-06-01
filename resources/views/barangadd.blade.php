@extends('layouts.level3')
@section('title','Tambah golongan - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Tambah Barang</h5>
      <form class="form-horizontal" action="/barang/insert" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-sm-6">
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Kode Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="code" placeholder="Ketikkan kode barang" required autofocus>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Nama barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="name" placeholder="Ketikkan nama barang" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="description" placeholder="Deskripsi barang">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Sub Kelompok Barang</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="subkelompok" required>
                <option value="">Pilih Sub Kelompok Barang</option>
                <optgroup label="---">
                  @foreach($subkelompoks as $subkelompok)
                    <option value="{{ $subkelompok->id }}">{{ $subkelompok->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
              <a href="/barang" type="submit" class="btn btn-sm btn-default">Batal</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-6">&nbsp;</div>
    </div>
  </div>
@endsection
