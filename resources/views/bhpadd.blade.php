@extends('layouts.level3')
@section('title','Tambah golongan - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Tambah Barang</h5>
      <form class="form-horizontal" action="/bhp/insert" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-sm-6">
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Mutasi</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="mutasi" required>
                <option value="">Pilih mutasi</option>
                <optgroup label="---">
                  @foreach($mutations as $mutation)
                    <option value="{{ $mutation->id }}">{{ $mutation->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Tanggal Lahir</label>
            <div class="col-sm-8">
              <input type="text" class="form-control datepicker" id="text" name="date" placeholder="yyyy-mm-dd">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Unit Kerja</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="unit_kerja" required>
                <option value="">Pilih unit kerja</option>
                <optgroup label="---">
                  @foreach($unit_kerjas as $unit_kerja)
                    <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Pegawai</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="pegawai" required>
                <option value="">Pilih nama pegawai</option>
                <optgroup label="---">
                  @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Jabatan</label>
            <div class="col-sm-8">
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
            <label class="control-label col-sm-4" for="name">Golongan</label>
            <div class="col-sm-8">
              <select class="from-control golongan" id="sel1" name="golongan" required>
                <option value="">Pilih Golongan Barang</option>
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
                $('.barangg').empty();
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
                <option value="">Pilih Bidang Barang</option>
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
                $('.barangg').empty();
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
                <option value="">Pilih Kelompok Barang</option>
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
                $('.barangg').empty();
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
                <option value="">Pilih Sub Kelompok Barang</option>
                <optgroup label="---">
                  @foreach($subkelompoks as $subkelompok)
                    <option value="{{ $subkelompok->id }}">{{ $subkelompok->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <script>
            $( ".subkelompok" ).change(function(e) {
              var barang_id = e.target.value;
              $.get('/barang/ajax-nama-barang?barang_id=' + barang_id, function(data){
                console.log(data);
                $('.barangg').empty();
                $.each(data,function(index, barangObj){
                  $('.barangg').append('<option value="'+barangObj.id+'">'+barangObj.name+'</option>');
                });
              });
            });
          </script>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Nama Barang</label>
            <div class="col-sm-8">
              <select class="from-control barangg" id="sel1" name="barang" required>
                <option value="">Pilih Nama Barang</option>
                <optgroup label="---">
                  @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->name }}</option>
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
      <div class="col-sm-6">
        <div class="form-group required">
          <label class="control-label col-sm-4" for="name">Jumlah unit</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="text" name="quantity" placeholder="Deskripsi barang" required="">
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-4" for="name">Satuan</label>
          <div class="col-sm-8">
            <select class="from-control" id="sel1" name="satuan" required>
              <option value="">Pilih satuan barang</option>
              <optgroup label="---">
                @foreach($satuans as $satuan)
                  <option value="{{ $satuan->name }}">{{ $satuan->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>

        <div class="form-group required">
          <label class="control-label col-sm-4" for="source">Nama Toko</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="source" placeholder="Ketikkan nama barang" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-4" for="name">No. Berita Acara / Kwitansi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="po_id" placeholder="Ketikkan nama barang" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Tanggal Berita Acara / Kwitansi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control datepicker" id="text" name="po_date" placeholder="yyyy-mm-dd">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Uraian Berita Acara / Kwitansi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="po_description" placeholder="Ketikkan nama barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="source">Harga per Unit</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="text" name="price" placeholder="Ketikkan nama barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="source">Total harga</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="text" name="sum" placeholder="Ketikkan nama barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Deskripsi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="description" placeholder="Deskripsi barang">
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
