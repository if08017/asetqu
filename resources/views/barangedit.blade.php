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
            <label class="control-label col-sm-4" for="name">Satuan</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="satuan" required>
                <option value="{{ $barang->satuan_name }}">{{ $barang->satuan_name }}</option>
                <optgroup label="---">
                  @foreach($satuans as $satuan)
                    <option value="{{ $satuan->name }}">{{ $satuan->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Golongan</label>
            <div class="col-sm-8">
              <select class="from-control golongan" id="sel1" name="golongan" required>
                <option value="{{ $barang->golongan_barang_id }}">{{ $barang->golongan_barang_name }}</option>
                <optgroup label="---">
                  @foreach($golongans as $golongan)
                    <option value="{{ $golongan->id }}">{{ $golongan->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <script>
            $( ".golongan" ).change(function(e) {
              var bidang_id = e.target.value;
              $.get('/barang/ajax-bidang?bidang_id=' + bidang_id, function(data){
                console.log(data);
                $('.bidang').empty();
                $('.kelompok').empty();
                $('.subkelompok').empty();
                $.each(data,function(index, bidangObj){
                  $('.bidang').append('<option value="'+bidangObj.id+'">'+bidangObj.name+'</option>');
                });
              });
            });
          </script>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Bidang</label>
            <div class="col-sm-8">
              <select class="from-control bidang" id="sel1" name="bidang" required>
                <option value="{{ $barang->bidang_barang_id }}">{{ $barang->bidang_barang_name }}</option>
                <optgroup label="---">
                  @foreach($bidangs as $bidang)
                    <option value="{{ $bidang->id }}">{{ $bidang->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <script>
            $( ".bidang" ).change(function(e) {
              var kelompok_id = e.target.value;
              $.get('/barang/ajax-kelompok?kelompok_id=' + kelompok_id, function(data){
                console.log(data);
                $('.kelompok').empty();
                $('.subkelompok').empty();
                $.each(data,function(index, kelompokObj){
                  $('.kelompok').append('<option value="'+kelompokObj.id+'">'+kelompokObj.name+'</option>');
                });
              });
            });
          </script>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Kelompok</label>
            <div class="col-sm-8">
              <select class="from-control kelompok" id="sel1" name="kelompok" required>
                <option value="{{ $barang->kelompok_barang_id }}">{{ $barang->kelompok_barang_name }}</option>
                <optgroup label="---">
                  @foreach($kelompoks as $kelompok)
                    <option value="{{ $kelompok->id }}">{{ $kelompok->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <script>
            $( ".kelompok" ).change(function(e) {
              var subkelompok_id = e.target.value;
              $.get('/barang/ajax-sub-kelompok?subkelompok_id=' + subkelompok_id, function(data){
                console.log(data);
                $('.subkelompok').empty();
                $.each(data,function(index, subkelompokObj){
                  $('.subkelompok').append('<option value="'+subkelompokObj.id+'">'+subkelompokObj.name+'</option>');
                });
              });
            });
          </script>
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
