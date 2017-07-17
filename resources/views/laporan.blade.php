@extends('layouts.level3')
@section('title','Laporan - Asetqu')
@section('content')
      <div class="col-sm-10 content4">
        <div class="col-sm-12">
          <div class="panel panel-danger">
            <div class="panel-heading">Rekapitulasi Barang Inventaris <span class="badge">{{ date('Y')}}</span></div>
            <div class="panel-body">
              <div class="table-responsive report">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Laporan</th>
                      <th>Download (files)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>REKAPITULASI BARANG INVENTARIS</td>
                      <td>
                        <a href="/laporan/inventaris/pdf" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></a>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>ASET AKTIF + ASET DALAM USULAN PENGHAPUSAN</td>
                      <td>
                        <a href="/laporan/inventaris_aktif_usulan/pdf" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></a>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>ASET DALAM USULAN PENGHAPUSAN</td>
                      <td>
                        <a href="/laporan/inventaris_usulan/pdf" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></a>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>ASET YANG DIMUTASIKAN PINDAH DAN ASET YANG TELAH DIHAPUS</td>
                      <td>
                        <a href="/laporan/inventaris_mutasi_hapus/pdf" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></a>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>
                    <tr>
                      <form action="laporan/inventaris_perpengguna/pdf" method="POST">
                        {{ csrf_field() }}
                      <td>5</td>
                      <td>
                        ASET PER PENGGUNA (TIDAK TERMASUK BARANG HABIS PAKAI)
                        <select class="" name="pengguna" required>
                          <option value="">Pilih Pengguna</option>
                          @foreach ($pegawais as $pegawai)
                          <option value="{{ $pegawai->id }}">{{ $pegawai->name }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <button type="submit" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></button>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                      </form>
                    </tr>
                    <tr>
                      <form action="laporan/inventaris_perjenis/pdf" method="POST">
                        {{ csrf_field() }}
                      <td>6</td>
                      <td>
                        ASET PER JENIS/BIDANG BARANG
                        <select class="" name="bidang" required>
                          <option value="">Pilih Per Bidang</option>
                          @foreach ($bidangs as $bidang)
                          <option value="{{ $bidang->id }}">{{ $bidang->name }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <button type="submit" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></button>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                      </form>
                    </tr>
                    <tr>
                      <form action="laporan/inventaris_perjenis_persatuan_kerja/pdf" method="POST">
                      {{ csrf_field() }}
                      <td>7</td>
                      <td>
                        BARANG HABIS PAKAI PERJENIS BARANG PER SATUAN KERJA (OPD)
                        <select class="" name="bidang" required>
                          <option value="">Pilih Bidang Barang</option>
                          @foreach ($bidangs_barang_habis_pakai as $bidang_barang_habis_pakai)
                          <option value="{{ $bidang_barang_habis_pakai->id }}">{{ $bidang_barang_habis_pakai->name }}</option>
                          @endforeach
                        </select>
                        <select class="" name="satuan" required>
                          <option value="">Pilih Satuan Kerja</option>
                          @foreach ($satuankerjas as $satuankerja)
                          <option value="{{ $satuankerja->id }}">{{ $satuankerja->name }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <button class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span> <span class="badge">locked</span></button>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                      </form>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>
                        BARANG HABIS PAKAI PERJENIS BARANG PER UNIT KERJA (BAGIAN)
                        <select class="" name="bidang" required>
                          <option value="">Pilih Bidang Barang</option>
                          @foreach ($bidangs_barang_habis_pakai as $bidang_barang_habis_pakai)
                          <option value="{{ $bidang_barang_habis_pakai->id }}">{{ $bidang_barang_habis_pakai->name }}</option>
                          @endforeach
                        </select>
                        <select class="from-control unitkerja" id="sel1" name="unitkerja" required>
                          <option value="">Pilih unit kerja</option>
                          <optgroup label="---">
                            @foreach($unit_kerjas as $unit_kerja)
                              <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->name }}</option>
                            @endforeach
                          </optgroup>
                        </select>
                      </td>
                      <td>
                        <a href="/laporan/1/pdf" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></a>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>

                    <tr>
                      <td>9</td>
                      <td>
                        BARANG HABIS PAKAI PER UNIT KERJA (BAGIAN)
                        <select class="from-control unitkerja" id="sel1" name="unitkerja" required>
                          <option value="">Pilih unit kerja</option>
                          <optgroup label="---">
                            @foreach($unit_kerjas as $unit_kerja)
                              <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->name }}</option>
                            @endforeach
                          </optgroup>
                        </select>
                      </td>
                      <td>
                        <a href="/laporan/1/pdf" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"> </span><span class="badge">locked</span></a>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>
                    <tr>
                      <form action="laporan/inventaris_perruangan/pdf" method="POST">
                        {{ csrf_field() }}
                      <td>10</td>
                      <td>

                        KARTU INVENTARIS RUANGAN (PERUANGAN)
                        <select class="from-control" id="sel1" name="ruangan" required>
                          <option value="">Pilih ruangan</option>
                          <optgroup label="---">
                            @foreach($ruangans as $ruangan)
                              <option value="{{ $ruangan->id }}">{{ $ruangan->name }}</option>
                            @endforeach
                          </optgroup>
                        </select>
                      </td>
                      <td>
                        <button class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></button>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>BUKU BARANG INVENTARIS</td>
                      <td>
                        <a href="/laporan/inventaris/buku" class="btn btn-xs btn-danger"><span class="fa fa-file-pdf-o fa-lg"></span></a>
                        <!-- <a href="/laporan/1/excel" class="btn btn-xs btn-success"><span class="fa fa-file-excel-o fa-lg"></span></a> -->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
