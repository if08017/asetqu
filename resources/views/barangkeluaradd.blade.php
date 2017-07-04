@extends('layouts.level3')
@section('title','Tambah golongan - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Tambah Inventoris Barang</h5>
      <form class="form-horizontal" action="/barang/keluar/insert" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-sm-6">
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Kode Barang</label>
            <div class="col-sm-8">
              <div class="input-group">
                <input type="text" class="form-control code" id="code" name="code" placeholder="Ketikkan kode/nama barang" required autofocus>
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </span>
              </div>
            </div>
            <script type="text/javascript">
              $(document).ready(function(){
                $('#code').on("mouseover", function(event){
                  //$("div").html("Event: " + event.type);
                  $("#code").autocomplete({
                    source: "{{ route('barang.mutation.autocomplete') }}",
                    minLength: 3,
                    select: function(event, ui){
                      console.log(ui);
                      // $("#code").val(ui.item.id);
                    }
                  });
                });
              });
            </script>
            <script>
              $( ".code" ).change(function(e) {
                var barang_code = e.target.value;
                $.get('/barang/ajax-mutation?barang_code=' + barang_code, function(data){
                  console.log(data);
                  $('.name').empty();
                  $('.golongan').empty();
                  $('.bidang').empty();
                  $('.kelompok').empty();
                  $('.subkelompok').empty();
                  $('.brand').empty();
                  $.each(data,function(index, bidangObj){
                    $('.name').append('<input type="text" class="form-control" id="text" name="name" value="'+bidangObj.name+'" required readonly="readonly"> <input type="hidden" class="form-control" id="text" name="barang_id" value="'+bidangObj.id+'" required readonly="readonly">');
                    $('.golongan').append('<input type="text" class="form-control" id="text" name="golongan" value="'+bidangObj.golongan_barang_name+'" required readonly="readonly"> <input type="hidden" class="form-control" id="text" name="golongan_barang_id" value="'+bidangObj.golongan_barang_id+'" required readonly="readonly">');
                    $('.bidang').append('<input type="text" class="form-control" id="text" name="bidang" value="'+bidangObj.bidang_barang_name+'" required readonly="readonly"> <input type="hidden" class="form-control" id="text" name="bidang_barang_id" value="'+bidangObj.bidang_barang_id+'" required readonly="readonly">');
                    $('.kelompok').append('<input type="text" class="form-control" id="text" name="kelompok" value="'+bidangObj.kelompok_barang_name+'" required readonly="readonly"> <input type="hidden" class="form-control" id="text" name="kelompok_barang_id" value="'+bidangObj.kelompok_barang_id+'" required readonly="readonly">');
                    $('.subkelompok').append('<input type="text" class="form-control" id="text" name="sub_kelompok" value="'+bidangObj.sub_kelompok_barang_name+'" required readonly="readonly"> <input type="hidden" class="form-control" id="text" name="sub_kelompok_barang_id" value="'+bidangObj.sub_kelompok_barang_id+'" required readonly="readonly">');
                    $('.brand').append('<input type="text" class="form-control" id="text" name="brand" value="'+bidangObj.brand+'" required readonly="readonly"> <input type="hidden" class="form-control" id="text" name="brand" value="'+bidangObj.brand+'" required readonly="readonly">');
                });
                });
              });
            </script>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Quantitas</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="text" name="quantity" placeholder="Jumlah barang" required>
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
            <label class="control-label col-sm-4" for="name">Kondisi</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="kondisi" required>
                <option value="">Pilih Kondisi</option>
                <optgroup label="---">
                  @foreach($kondisis as $kondisi)
                    <option value="{{ $kondisi->id }}">{{ $kondisi->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Status</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="status" required>
                <option value="">Pilih Status</option>
                <optgroup label="---">
                  @foreach($statuss as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="description" placeholder="Deskripsi barang">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
              <a href="/inventori" type="submit" class="btn btn-sm btn-default">Batal</a>
            </div>
          </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Nama barang</label>
          <div class="col-sm-8 name"></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Golongan</label>
          <div class="col-sm-8 golongan"></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Bidang</label>
          <div class="col-sm-8 bidang"></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Kelompok</label>
          <div class="col-sm-8 kelompok"></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Sub Kelompok</label>
          <div class="col-sm-8 subkelompok"></div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="name">Merek</label>
          <div class="col-sm-8 brand"></div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
