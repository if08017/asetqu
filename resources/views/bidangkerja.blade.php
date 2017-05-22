@extends('layouts.level3')
@section('title','Bidang Kerja - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <div class="col-sm-5">
          <h5>Unit Kerja</h5>
          <div class="table-responsive">
            <table class="table table-condensed table-hover">
              <tr>
                <form action="/bidang/unitkerja/insert" method="POST">
                  {{ csrf_field() }}
                <td>
                    <input type="text" class="form-control input-sm" id="text" name="name" placeholder="Ketikkan nama satuan kerja" required>
                </td>
                <td>
                    <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
                </td>
                </form>
              </tr>
            </table>
            <p><strong>Total : {{ $unitkerjas->total() }} data</strong> | Tampil {{ $unitkerjas->count() }} list</p>
            <table class="table table-condensed table-hover">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($unitkerjas as $unitkerja)
                  <tr>
                    <td>{{ $unitkerja->name }}</td>
                    <td>
                      <a class="btn btn-xs btn-warning" href="/bidang/unitkerja/{{$unitkerja->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                      <a class="btn btn-xs btn-danger" href="/bidang/unitkerja/{{$unitkerja->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-center">
              {{$unitkerjas->links()}}
            </div>
          </div>
      </div>
      <div class="col-sm-7">
        <h5>Satuan Kerja</h5>
        <div class="table-responsive">
          <table class="table table-condensed table-hover">
            <tr>
              <form action="/bidang/satuankerja/insert" method="POST">
                {{ csrf_field() }}
              <td>
                <input type="number" class="form-control input-sm" id="text" name="code" placeholder="Kode" required>
              </td>
              <td>
                <input type="text" class="form-control input-sm" id="text" name="name" placeholder="Ketikkan nama satuan kerja" required>
              </td>
              <td>
                <select class="from-control" id="sel1" name="unitkerja" required>
                  <option value="">Pilih unit kerja</option>
                  <optgroup label="---">
                    @foreach($unitkerjas as $unitkerja)
                      <option value="{{ $unitkerja->id }}">{{ $unitkerja->name }}</option>
                    @endforeach
                  </optgroup>
                </select>
              </td>
              <td>
                <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
              </td>
              </form>
            </tr>
          </table>
          <p><strong>Total : {{ $satuankerjas->total() }} data</strong> | Tampil {{ $satuankerjas->count() }} list</p>
          <table class="table table-condensed table-hover">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Satuan Kerja</th>
                <th>Nama Unit Kerja</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($satuankerjas as $satuankerja)
                <tr>
                  <td>{{ $satuankerja->code }}</td>
                  <td>{{ $satuankerja->name }}</td>
                  <td>{{ $satuankerja->unit_kerja_name }}</td>
                  <td>
                    <a class="btn btn-xs btn-warning" href="/bidang/satuankerja/{{$satuankerja->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-xs btn-danger" href="/bidang/satuankerja/{{$satuankerja->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center">
            {{$satuankerjas->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
