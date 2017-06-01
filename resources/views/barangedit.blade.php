@extends('layouts.level3')
@section('title','Edit barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <form class="form-horizontal" action="/barang/{{$barang->id}}" method="POST" enctype="multipart/form-data">
        <h5>Edit barang</h5>
        {{ csrf_field() }}
        <div class="col-sm-6">
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Kode Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="code" value="{{ $barang->code }}" required>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="name" value="{{ $barang->name }}" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="description" value="{{ $barang->description }}">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Sub-kelompok</label>
            <div class="col-sm-8">
              <select class="from-control subkelompok" id="sel1" name="subkelompok" required>
                <option value="{{ $barang->sub_kelompok_barang_id }}">{{ $barang->sub_kelompok_barang_name }}</option>
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
        </div>
        <div class="col-sm-6">&nbsp;</div>
      </form>
    </div>
  </div>
@endsection
