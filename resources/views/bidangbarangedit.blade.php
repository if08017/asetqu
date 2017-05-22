@extends('layouts.level3')
@section('title','Edit bidang barang  - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h3>Edit Bidang Barang</h3>
      <form class="form-horizontal" action="/barang/bidang/{{$bidangbarang->id}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Kode</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="code" value="{{ $bidangbarang->code }}" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="name">Nama Bidang Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="text" name="name" value="{{ $bidangbarang->name }}" required>
          </div>
        </div>
        <div class="form-group required">
          <label class="control-label col-sm-3" for="select">Pilih golongan barang</label>
          <div class="col-sm-9">
            <select class="from-control" id="sel1" name="golonganbarang">
              <option value="{{ $bidangbarang->golongan_barang_id }}">{{ $bidangbarang->golongan_barang_name }}</option>
              <optgroup label="---">
                @foreach($golonganbarangs as $golonganbarang)
                  <option value="{{ $golonganbarang->id }}">{{ $golonganbarang->name }}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <!-- <div class="form-group">
          <label class="control-label col-sm-3" for="name">Status</label>
          <div class="col-sm-9">
            <div class="checkbox">
              @if(($bidangbarang->status) == 'on')
                <label><input type="checkbox" name="status" checked>Aktif</label>
              @else
                <label><input type="checkbox" name="status">Aktif</label>
              @endif
            </div>
          </div>
        </div> -->
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <a href="/barang/golongan" type="submit" class="btn btn-sm btn-primary">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
