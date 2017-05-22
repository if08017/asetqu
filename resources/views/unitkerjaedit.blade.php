@extends('layouts.level3')
@section('title','Edit unit kerja  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h3>Edit Unit Kerja</h3>
      <form class="form-horizontal" action="/bidang/unitkerja/{{$unitkerja->id}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Nama Satuan Kerja</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" value="{{ $unitkerja->name }}" required>
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
