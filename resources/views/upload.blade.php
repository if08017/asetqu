@extends('layouts.level3')
@section('title','Tambah golongan - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Tambah Barang</h5>
        <div class="col-sm-6">
          <div class="form-group">
            <div class="col-sm-4">
              <img src="/images/inventori/default.png" style="max-width:100px; max-height:100px; float:left; border-radius:10%; margin-fight:25px;">
            </div>
            <div class="col-sm-8">
              <form class="form-horizontal" action="/barang/input/insert" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label>Upload gambar</label>
                <input type="file" name="picture">
                <input type="submit" name="" value="Upload">
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
