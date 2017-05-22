@extends('layouts.level3')
@section('title','Tambah kategori - Asetqu')
@section('content')
    <div class="col-sm-9 content2">
      <h3>Tambah Kategori</h3>
      <form class="form-horizontal" action="/kategori/insert" method="POST">
        {{ csrf_field() }}
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Kode Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="code" placeholder="Ketikkan kode kategori" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Nama Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" placeholder="Ketikkan nama kategori" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="select">Pilih Golongan</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="induk">
              @foreach($golongans as $golongan)
                <option value="{{ $golongan->id }}">{{ $golongan->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Status</label>
          <div class="col-sm-9">
            <div class="checkbox">
              <label><input type="checkbox" name="status" checked>Aktif</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
