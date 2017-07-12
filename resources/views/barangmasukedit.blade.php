@extends('layouts.level3')
@section('title','Edit barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <form class="form-horizontal" action="/barang/masuk/{{$barang->id}}" method="POST" enctype="multipart/form-data">
        <h5>Edit barang masuk</h5>
        {{ csrf_field() }}
        <div class="col-sm-6">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $barang->barang_id }}">
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="name" value="{{ $barang->barang_name }}" readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Nomor PO/Kuitansi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="number" placeholder="PO-123-1717" value="{{ $barang->number }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Quantitas</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="quantity" placeholder="Quantitas" value="{{ $barang->quantity }}">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Pengguna</label>
            <div class="col-sm-8">
              <select class="from-control" id="sel1" name="pegawai" required>
                <option value="{{ $barang->pegawai_id }}">{{ $barang->pegawai_name }}</option>
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
                <option value="{{ $barang->ruangan_id }}">{{ $barang->ruangan_name }}</option>
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
                <option value="{{ $barang->kondisi_barang_id }}">{{ $barang->kondisi_barang_name }}</option>
                <optgroup label="---">
                  @foreach($kondisis as $kondisi)
                    <option value="{{ $kondisi->id }}">{{ $kondisi->name }}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="description" value="{{ $barang->description }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Harga</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="price" value="{{ $barang->price }}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
              <a href="/barang/masuk" type="submit" class="btn btn-sm btn-default">Batal</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <div class="col-sm-4">
              <img src="/images/inventori/{{ $barang->picture }}" alt="" style="max-height:50px;">
            </div>
            <div class="col-sm-8">
              <input type="file" name="picture">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Warna</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="color" value="{{ $barang->color }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="size" value="{{ $barang->size }}">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Bahan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="material" value="{{ $barang->material }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Sumber</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="source" value="{{ $barang->source }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Tahun Pembuatan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="created_year" value="{{ $barang->created_year }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Tahun Pembelian</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="buy_year" value="{{ $barang->buy_year }}">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
