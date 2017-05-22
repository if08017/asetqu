@extends('layouts.level3')
@section('title','Edit golongan - Asetqu')
@section('content')
    <div class="col-sm-9 content2">
      <h3>Edit Golongan</h3>
      <form class="form-horizontal" action="/barang/golongan/{{$golongans->id}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Kode Golongan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="code" value="{{ $golongans->code }}" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Nama Golongan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" value="{{ $golongans->name }}" required>
          </div>
        </div>
        <!-- <div class="form-group">
          <label class="control-label col-sm-3" for="name">Status</label>
          <div class="col-sm-9">
            <div class="checkbox">
              @if(($golongans->status) == 'on')
                <label><input type="checkbox" name="status" checked>Aktif</label>
              @else
                <label><input type="checkbox" name="status">Aktif</label>
              @endif
            </div>
          </div>
        </div> -->
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
