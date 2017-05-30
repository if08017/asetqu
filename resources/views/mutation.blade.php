@extends('layouts.level3')
@section('title','Mutasi barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Rincian barang dengan kode</h5>
      <div class="col-sm-6">
        <div class="form-group">
            <div class="input-group col-sm-8">
              <input type="text" class="form-control code" id="code" name="code" placeholder="Ketikkan kode/nama barang" required>
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm btn-primary">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </span>
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
                $('.quantity').empty();
                $('.price').empty();
                $('.satuan').empty();
                $('.kondisi').empty();
                $('.status').empty();
                $('.golongan').empty();
                $('.bidang').empty();
                $('.kelompok').empty();
                $('.subkelompok').empty();
                $('.created_year').empty();
                $('.buy_year').empty();
                $('.pic').empty();
                // $('.okezone').append('<p>'+data.id+'</p>');
                $.each(data,function(index, bidangObj){
                  $('.name').append('<p>'+bidangObj.name+'</p>');
                  $('.quantity').append('<p>'+bidangObj.quantity+'</p>');
                  $('.price').append('<p>'+bidangObj.price+'</p>');
                  $('.satuan').append('<p>'+bidangObj.satuan_name+'</p>');
                  $('.kondisi').append('<p>'+bidangObj.kondisi_name+'</p>');
                  $('.status').append('<p>'+bidangObj.status_name+'</p>');
                  $('.golongan').append('<p>'+bidangObj.golongan_barang_name+'</p>');
                  $('.bidang').append('<p>'+bidangObj.bidang_barang_name+'</p>');
                  $('.kelompok').append('<p>'+bidangObj.kelompok_barang_name+'</p>');
                  $('.subkelompok').append('<p>'+bidangObj.sub_kelompok_barang_name+'</p>');
                  $('.created_year').append('<p>'+bidangObj.created_year+'</p>');
                  $('.buy_year').append('<p>'+bidangObj.buy_year+'</p>');
                  $('.pic').append('<p>'+bidangObj.pegawai_name+'</p>');
                  $('.barang_id').append('<input type="hidden" name="id" value="'+bidangObj.id+'">');

                });
              });
            });
          </script>
        </div>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="col-sm-3">Entitas</th>
              <th class="col-sm-9">Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            <tr> <td>Nama</td> <td class="name"></td> </tr>
            <tr> <td>Kuantitas</td> <td class="quantity"></td> </tr>
            <tr> <td>Harga</td> <td class="price"></td> </tr>
            <tr> <td>Satuan</td> <td class="satuan"></td> </tr>
            <tr> <td>Kondisi</td> <td class="kondisi"></td> </tr>
            <tr> <td>Status</td> <td class="status"></td> </tr>
            <tr> <td>Golongan</td> <td class="golongan"></td> </tr>
            <tr> <td>Bidang</td> <td class="bidang"></td> </tr>
            <tr> <td>Kelompok</td> <td class="kelompok"></td> </tr>
            <tr> <td>Sub Kelompok</td> <td class="subkelompok"></td> </tr>
            <tr> <td>Tahun Pembuatan</td> <td class="created_year"></td> </tr>
            <tr> <td>Tahun Beli</td> <td class="buy_year"></td> </tr>
            <tr> <td>Tanggal Serahterima</td> <td class="receipt_date"></td> </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-6">
        <form class="form-horizontal" action="/barang/mutation/insert" method="POST">
          <h5>Edit barang</h5>
          {{ csrf_field() }}

          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Quantitas</label>
            <div class="col-sm-8 barang_id">
              <input type="number" class="form-control" id="text" name="quantity" value="" required>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Pegawai / PIC</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="pegawai" required>
                <option value="">Pilih PIC</option>
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
                <option value="">Pilih Ruangan</option>
                <optgroup label="---">
                  @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan->id }}">{{ $ruangan->name }}</option>
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
        </form>
      </div>
    </div>
</div>
@endsection
