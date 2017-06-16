@extends('layouts.level3')
@section('title','Edit barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <form class="form-horizontal" action="/inventori/{{$inventori->id}}" method="POST" enctype="multipart/form-data">
        <h5>Edit barang</h5>
        {{ csrf_field() }}
        <div class="col-sm-6">
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Kode Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="code" value="{{ $inventori->barang_code }}" readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Nama Barang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="name" value="{{ $inventori->barang_name }}" readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Deskripsi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="description" value="{{ $inventori->description }}">
            </div>
          </div>
          <div class="form-group required">
            <label class="control-label col-sm-4" for="name">Quantitas</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="text" name="quantity" value="{{ $inventori->quantity }}" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Nomor PO/Kuitansi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="number" placeholder="PO-123-1717" value="{{ $inventori->number }}">
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

          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Ukuran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="text" name="size" value="{{ $inventori->size }}">
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
