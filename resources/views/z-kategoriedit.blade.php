@extends('layouts.level3')
@section('title','Edit kategori - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h3>Edit Kategori</h3>
      <form class="form-horizontal" action="/kategori/{{$kategori->id}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Kode Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="code" value="{{ $kategori->code }}" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Nama Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" value="{{ $kategori->name }}" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="select">Pilih list Induk</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="induk">
              <optgroup label="">
                <option value="{{ $kategori->golongan_id }}"> {{ $kategori->golongan_name }}</option>
              </optgroup>
              <optgroup label="---">
                @foreach($golongans as $golongan)
                  <option value="{{ $golongan->id }}">{{ $golongan->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Status</label>
          <div class="col-sm-9">
            <div class="checkbox">
              @if(($kategori->status) == 'on')
                <label><input type="checkbox" name="status" checked>Aktif</label>
              @else
                <label><input type="checkbox" name="status">Aktif</label>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
