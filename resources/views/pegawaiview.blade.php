@extends('layouts.level3')
@section('title','Pegawai - Asetqu')
@section('content')
    <div class="col-sm-10 content2">
      <h5>Rincian pegawai atas nama "{{$pegawai->name}}"</h5>
      <div class="text-right">
        <a class="btn-sm btn-primary" href="/pegawai"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>kembali</a>
        <a class="btn-sm btn-success" href="/pegawai"><span class="glyphicon glyphicon-export" aria-hidden="true"></span>export PDF</a>
        <a class="btn-sm btn-warning" href="/pegawai/{{$pegawai->id}}/edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>edit</a>
        <a class="btn-sm btn-danger" href="/pegawai/{{$pegawai->id}}/delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>delete</a>
      </div>
      <table class="table table-condensed table-hover">
        <thead>
          <tr>
            <th class="col-sm-3">Entitas</th>
            <th class="col-sm-9">Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <tr> <td>NIP</td> <td>{{$pegawai->nip}}</td> </tr>
          <tr> <td>Nama</td> <td>{{$pegawai->name}}</td> </tr>
          <tr> <td>Kontak</td> <td>{{$pegawai->contact}}</td> </tr>
          <tr> <td>Email</td> <td>{{$pegawai->email}}</td> </tr>
          <tr> <td>Alamat</td> <td>{{$pegawai->address}}</td> </tr>
          <tr> <td>Jenis Kelamin</td> <td>{{$pegawai->sex}}</td> </tr>
          <tr> <td>Tanggal Lahir</td> <td>{{$pegawai->birthday}}</td> </tr>
          <tr> <td>Jabatan</td> <td>{{$pegawai->jabatan_name}}</td> </tr>
          <tr> <td>Unit Kerja</td> <td>{{$pegawai->unit_kerja_name}}</td> </tr>
          <tr> <td>Satuan Kerja</td> <td>{{$pegawai->satuan_kerja_name}}</td> </tr>
          <tr> <td>Provinsi</td> <td>{{$pegawai->provinsi_name}}</td> </tr>
          <tr> <td>Kabupaten</td> <td>{{$pegawai->kabupaten_name}}</td> </tr>
          <tr> <td>Tanggal Pembuatan</td> <td>{{$pegawai->created_at}}</td> </tr>
          <tr> <td>Tanggal Perubahan</td> <td>{{$pegawai->updated_at}}</td> </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
