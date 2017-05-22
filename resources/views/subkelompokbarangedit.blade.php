@extends('layouts.level3')
@section('title','Edit sub kelompok barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h3>Edit Sub Kelompok Barang</h3>
      <form class="form-horizontal" action="/barang/subkelompok/{{$subkelompokbarang->id}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Kode</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="code" value="{{ $subkelompokbarang->code }}" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Nama Sub Kelompok Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" value="{{ $subkelompokbarang->name }}" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="select">Pilih kelompok barang</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="kelompokbarang">
              <option value="{{ $subkelompokbarang->kelompok_barang_id }}">{{ $subkelompokbarang->kelompok_barang_name }}</option>
              <optgroup label="---">
                @foreach($kelompokbarangs as $kelompokbarang)
                  <option value="{{ $kelompokbarang->id }}">{{ $kelompokbarang->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <a href="/management" type="submit" class="btn btn-sm btn-primary">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
