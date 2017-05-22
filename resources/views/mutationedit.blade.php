@extends('layouts.level3')
@section('title','Mutasi barang - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Rincian barang dengan kode</h5>
      <div class="col-sm-6">
        <div class="form-group">
          <div class="col-sm-8">
            <input type="text" class="form-control" id="code" name="code" placeholder="Ketikkan kode barang" required>
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
        </div>
        <table class="table table-condensed table-hover">
          <thead>
            <tr>
              <th class="col-sm-3">Entitas</th>
              <th class="col-sm-9">Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            <tr> <td>Nama</td> <td></td> </tr>
            <tr> <td>Kuantitas</td> <td></td> </tr>
            <tr> <td>Satuan</td> <td></td> </tr>
            <tr> <td>Kondisi</td> <td></td> </tr>
            <tr> <td>Status</td> <td></td> </tr>
            <tr> <td>Ruangan</td> <td></td> </tr>
            <tr> <td>Golongan</td> <td></td> </tr>
            <tr> <td>Bidang</td> <td></td> </tr>
            <tr> <td>Kelompok</td> <td></td> </tr>
            <tr> <td>Sub Kelompok</td> <td></td> </tr>
            <tr> <td>Deskripsi</td> <td></td> </tr>
            <tr> <td>Harga</td> <td></td> </tr>
            <tr> <td>Nomor</td> <td></td> </tr>
            <tr> <td>Sumber</td> <td></td> </tr>
            <tr> <td>Ukuran</td> <td></td> </tr>
            <tr> <td>Merek</td> <td></td> </tr>
            <tr> <td>Warna</td> <td></td> </tr>
            <tr> <td>Bahan</td> <td></td> </tr>
            <tr> <td>Tahun Pembuatan</td> <td></td> </tr>
            <tr> <td>Tahun Beli</td> <td></td> </tr>
            <tr> <td>Tanggal Input</td> <td></td> </tr>
            <tr> <td>Tanggal Perubahan</td> <td></td> </tr>
            <tr> <td>Tanggal Serahterima</td> <td></td> </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm-6">
        <form class="form-horizontal" action="/barang}}" method="POST">
          <h5>Edit barang</h5>
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Quantitas</label>
            <div class="col-sm-8">
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
              <a href="/barang" type="submit" class="btn btn-sm btn-primary">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection
