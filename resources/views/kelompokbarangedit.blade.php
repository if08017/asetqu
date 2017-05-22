@extends('layouts.level3')
@section('title','Edit bidang barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h3>Edit Kelompok Barang</h3>
      <form class="form-horizontal" action="/barang/kelompok/{{$kelompokbarang->id}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Kode</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="text" name="code" value="{{ $kelompokbarang->code }}" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Nama Bidang Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" value="{{ $kelompokbarang->name }}" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="select">Pilih bidang barang</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="bidangbarang">
              <option value="{{ $kelompokbarang->bidang_barang_id }}">{{ $kelompokbarang->bidang_barang_name }}</option>
              <optgroup label="---">
                @foreach($bidangbarangs as $bidangbarang)
                  <option value="{{ $bidangbarang->id }}">{{ $bidangbarang->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <a href="/barang/kelompok" type="submit" class="btn btn-sm btn-primary">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
