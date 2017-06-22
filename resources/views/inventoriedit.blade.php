@extends('layouts.level3')
@section('title','Edit barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <form class="form-horizontal" action="/inventori/{{$inventori->id}}" method="POST" enctype="multipart/form-data">
        <h5>Edit barang</h5>
        {{ csrf_field() }}
        <div class="col-sm-6">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $inventori->barang_id }}">
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="name" value="{{ $inventori->barang_name }}" readonly="readonly">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Golongan</label>
            <div class="col-sm-8">
              <select class="from-control golongan" id="sel1" name="golongan" required>
                <option value="{{ $inventori->golongan_barang_id }}">{{ $inventori->golongan_barang_name }}</option>
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
                <option value="{{ $inventori->bidang_barang_id }}">{{ $inventori->bidang_barang_name }}</option>
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
                <option value="{{ $inventori->kelompok_barang_id }}">{{ $inventori->kelompok_barang_name }}</option>
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
                <option value="{{ $inventori->sub_kelompok_barang_id }}">{{ $inventori->sub_kelompok_barang_name }}</option>
                <optgroup label="---">
                  @foreach($subkelompoks as $subkelompok)
                    <option value="{{ $subkelompok->id }}">{{ $subkelompok->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Nomor PO/Kuitansi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="number" placeholder="PO-123-1717" value="{{ $inventori->number }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="description" value="{{ $inventori->description }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Harga</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="price" value="{{ $inventori->price }}">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Kondisi</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="kondisi" required>
                <option value="{{ $inventori->kondisi_name }}">{{ $inventori->kondisi_name }}</option>
                <optgroup label="---">
                  @foreach($kondisis as $kondisi)
                    <option value="{{ $kondisi->name }}">{{ $kondisi->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Kondisi</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="status" required>
                <option value="{{ $inventori->status_name }}">{{ $inventori->status_name }}</option>
                <optgroup label="---">
                  @foreach($statuss as $status)
                    <option value="{{ $status->name }}">{{ $status->name }}</option>
                  @endforeach
                </optgroup>
              </select>
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
            <div class="col-sm-4">
              <img src="/images/inventori/{{ $inventori->picture }}" alt="" style="max-height:50px;">
            </div>
            <div class="col-sm-8">
              <input type="file" name="picture">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Pengguna</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="pegawai" required>
                <option value="{{ $inventori->pegawai_id }}">{{ $inventori->pegawai_name }}</option>
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
                <option value="{{ $inventori->ruangan_id }}">{{ $inventori->ruangan_name }}</option>
                <optgroup label="---">
                  @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan->id }}">{{ $ruangan->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Merek</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="brand" value="{{ $inventori->brand }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Warna</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="color" value="{{ $inventori->color }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="size" value="{{ $inventori->size }}">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Bahan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="material" value="{{ $inventori->material }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Sumber</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="source" value="{{ $inventori->source }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Tahun Pembuatan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="created_year" value="{{ $inventori->created_year }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Tahun Pembelian</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="buy_year" value="{{ $inventori->buy_year }}">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
