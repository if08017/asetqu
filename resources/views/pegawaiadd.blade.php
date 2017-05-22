@extends('layouts.level3')
@section('title','Edit barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h3>Tambah pegawai</h3>
      <form class="form-horizontal" action="/pegawai/insert" method="POST">
        {{ csrf_field() }}
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">NIP</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="text" name="nip" placeholder="Ketikkan NIP pegawai" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Nama Pegewai</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" placeholder="Ketikkan nama Ppegawai" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Kontak</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="contact" placeholder="Nomor handphone pegawai">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="text" name="email" placeholder="Email pegawai">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Alamat</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="address" placeholder="Alamat pegawai">
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Jenis Kelamin</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="sex" required>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="name">Tanggal Lahir</label>
          <div class="col-sm-9">
            <input type="text" class="form-control datepicker" id="text" name="birthday" placeholder="yyyy-mm-dd">
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Jabatan</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="jabatan" required>
              <option value="">Pilih jabatan</option>
              <optgroup label="---">
                @foreach($jabatans as $jabatan)
                  <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Unit Kerja</label>
          <div class="col-sm-9">
            <select class="from-control unitkerja" id="sel1" name="unitkerja" required>
              <option value="">Pilih unit kerja</option>
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
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Satuan Kerja</label>
          <div class="col-sm-9">
            <select class="from-control satuankerja" id="sel1" name="satuankerja" required>
              <option value="">Pilih Satuan Kerja</option>
            </select>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Penempatan</label>
          <div class="col-sm-9">
            <select class="from-control provinsi" id="sel1" name="provinsi" required>
              <option value="">Pilih Provinsi</option>
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
        <div class="form-group required">
          <label class="control-label col-sm-3" for="sel1">Kabupaten</label>
          <div class="col-sm-9">
            <select class="from-control kabupaten" id="sel1" name="kabupaten" required>
              <option value="">Pilih Kabupaten</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
            <a href="/pegawai" type="submit" class="btn btn-sm btn-primary">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
