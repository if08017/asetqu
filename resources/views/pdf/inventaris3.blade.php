<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <style>
    body{
      font-size: 11px;
    }
    table{
      border-collapse: collapse;
      margin: 0 auto;
    }
    td, th{
      border: 1px solid #333;
      padding: 5px;
    }
    .number{
      text-align: center;
    }
    .signature tr>td{
      border: none;
      text-align: center;
      padding: 20px;
    }
    .atas tr>td{
      border: none;
      text-align: left;
      padding: 5px;
    }
  </style>
</head>
<body>
    <div class="table-responsive report">
      <table class="table table-striped table-bordered">
        <thead class="atas">
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">OPD</td>
            <td colspan="4">03.06.01. SEKRETARIAT DAERAH</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">KABUPATEN/KOTA</td>
            <td colspan="4">PEMERINTAH KABUPATEN PESISIR SELATAN</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">PROVINSI</td>
            <td colspan="4">SUMATERA BARAT</td>
          </tr>
          <tr>
            <td colspan="8" style="text-align:center; padding: 10px;">DAFTAR BARANG INVENTARIS<br>ASET DALAM USULAN PENGHAPUSAN</td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Kode Lokasi</th>
          <th>Merek / Tipe</th>
          <th>Keadaan Barang</th>
          <th>Status</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @foreach ($barangs as $barang)
        @php ($a++)
        <tr>
          <td class="number"><strong>{{$a}}</strong></td>
          <td class="number">{{ $barang->barang_code }}</td>
          <td>{{ $barang->barang_name }}</td>
          <td class="number">{{ $barang->ruangan_code }}</td>
          <td>{{ $barang->barang_brand }}</td>
          <td>{{ $barang->kondisi_barang_name }}</td>
          <td>{{ $barang->status_mutasi_name }}</td>
          <td>{{ $barang->description }}</td>
        </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="3">Mengetahui</td>
          <td colspan="1">&nbsp;</td>
          <td colspan="4">PAINAN, {{ date('d M Y') }}</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="1">&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">Ir. Erizon, MT <br> NIP. 19630323 199003 1 005	</td>
          <td colspan="1"></td>
          <td colspan="4">WETRI MULYADEVITA, A.Md <br> NIP. 19800708 200902 2 003</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
