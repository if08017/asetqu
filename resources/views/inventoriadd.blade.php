@extends('layouts.level3')
@section('title','Tambah golongan - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Tambah Barang</h5>
      <form class="form-horizontal" action="/barang/insert" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-sm-6">
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Kode Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="code" placeholder="Ketikkan kode barang" required>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Nama barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="name" placeholder="Ketikkan nama barang" required>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Quantitas</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="text" name="quantity" placeholder="Jumlah barang" required>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Satuan</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="satuan" required>
                <option value="">Pilih jenis satuan</option>
                <optgroup label="---">
                  @foreach($satuans as $satuan)
                    <option value="{{ $satuan->name }}">{{ $satuan->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Pegawai / PIC</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="pegawai" required>
                <option value="">Pilih PIC barang</option>
                <optgroup label="---">
                  @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Ruangan</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="ruangan" required>
                <option value="">Pilih ruangan</option>
                <optgroup label="---">
                  @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan->id }}">{{ $ruangan->name }}</option>
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
                <option value="">Pilih Kelompok Barang</option>
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
                <option value="">Pilih Sub Kelompok Barang</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">&nbsp;</label>
            <div class="col-sm-8">
              <label>Upload gambar</label>
              <input type="file" name="picture">
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
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Nomor PO/Kuitansi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="number" placeholder="PO-123-1717">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Deskripsi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="description" placeholder="Deskripsi barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Harga</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="price" placeholder="Jumlah dalam rupiah">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Ukuran</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="size" placeholder="Kondisi barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Merek</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="brand" placeholder="Sumber barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Warna</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="color" placeholder="Sumber barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Bahan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="material" placeholder="Sumber barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Sumber</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="source" placeholder="Sumber barang">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Tahun Pembuatan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="year_created" placeholder="Tahun pembuatan">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Tahun Pembelian</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="text" name="year_buy" placeholder="Tahun pembelian">
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
