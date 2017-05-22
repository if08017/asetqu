@extends('layouts.level3')
@section('title','Edit barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h3>Edit pegawai</h3>
      <form class="form-horizontal" action="/pegawai/{{$pegawai->id}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">NIP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="nip" value="{{ $pegawai->nip }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Nama Pegewai</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" value="{{ $pegawai->name }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Kontak</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="contact" value="{{ $pegawai->contact }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Email</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="email" value="{{ $pegawai->email }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Alamat</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="address" value="{{ $pegawai->address }}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Jenis Kelamin</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="sex">
              <option value="{{ $pegawai->sex }}">{{ $pegawai->sex }}</option>
              <optgroup label="---">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Tanggal Lahir</label>
          <div class="col-sm-9">
            <input type="text" class="form-control datepicker" id="text" name="birthday" value="{{ $pegawai->birthday }}" placeholder="yyyy-mm-dd">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Jabatan</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="jabatan">
              <option value="{{ $pegawai->jabatan_id }}">{{ $pegawai->jabatan_name }}</option>
              <optgroup label="---">
                @foreach($jabatans as $jabatan)
                  <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Unit Kerja</label>
          <div class="col-sm-9">
            <select class="from-control unitkerja" id="sel1" name="unitkerja">
              <option value="{{ $pegawai->unit_kerja_id }}">{{ $pegawai->unit_kerja_name }}</option>
              <optgroup label="---">
                @foreach($unit_kerjas as $unit_kerja)
                  <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <script>
          $( ".unitkerja" ).change(function(e) {
            var satuan_id = e.target.value;
            $.get('/pegawai/ajax-satuan?satuan_id=' + satuan_id, function(data){
              //console.log(data);
              $('.satuankerja').empty();
              $.each(data,function(index, satuanObj){
                $('.satuankerja').append('<option value="'+satuanObj.id+'">'+satuanObj.name+'</option>');
              });
            });
          });
        </script>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Satuan Kerja</label>
          <div class="col-sm-9">
            <select class="from-control satuankerja" id="sel1" name="satuankerja">
              <option value="{{ $pegawai->satuan_kerja_id }}">{{ $pegawai->satuan_kerja_name }}</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="sel1">Provinsi</label>
          <div class="col-sm-9">
            <select class="from-control provinsi" id="sel1" name="provinsi">
              <option value="{{ $pegawai->provinsi_id }}">{{ $pegawai->provinsi_name }}</option>
              <optgroup label="---">
                @foreach($provinsis as $provinsi)
                  <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <script>
          $( ".provinsi" ).change(function(e) {
            //console.log(e);
            var kab_id = e.target.value;
            //alert( "Handler for .change() called." + kab_id);
            $.get('/pegawai/ajax-kab?kab_id=' + kab_id, function(data){
              //console.log(data);
              $('.kabupaten').empty();
              $.each(data,function(index, kabObj){
                $('.kabupaten').append('<option value="'+kabObj.id+'">'+kabObj.name+'</option>');
              });
            });
          });
        </script>
        <div class="form-group">
          <label class="control-label col-sm-3" for="sel1">Kabupaten</label>
          <div class="col-sm-9">
            <select class="from-control kabupaten" id="sel1" name="kabupaten">
              <option value="{{ $pegawai->kabupaten_id }}">{{ $pegawai->kabupaten_name }}</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <a href="/pegawai" type="button" class="btn btn-sm btn-primary">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
