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
            <td colspan="9" style="text-align:center; padding: 10px; text-transform: uppercase;">DAFTAR BARANG INVENTARIS<br>BARANG HABIS PAKAI PERJENIS BARANG PER SATUAN KERJA<br>{{ date('Y') }}</td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Kode Barang</th>
          <th rowspan="2">Nama Barang Habis Pakai</th>
          <th colspan="3">Total Barang</th>
          <th colspan="3">Jumlah Harga Barang</th>
          <th rowspan="2">Keterangan</th>
        </tr>
        <tr>
          <th>Masuk</th>
          <th>Keluar</th>
          <th>Sisa</th>
          <th>Bertambah</th>
          <th>Berkurang</th>
          <th>Sisa</th>
        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @foreach ($barangs as $barang)
        @php ($a++)
        <tr>
          <td class="number"><strong>{{$a}}</strong></td>
          <td>{{ $barang->barang_code }}</td>
          <td>{{ $barang->barang_name }}</td>
          <td>{{ $barang->jumlah_barang }}</td>
          <td></td>
          <!-- <td>{{ $barang->whereIn('mutation_name',['Keluar'])->sum('inventori_barang.quantity') }}</td> -->
          <td class="number">{{ $barang->quantity }}</td>
          <td>{{ $barang->total_harga }}</td>
          <td>{{ $barang->total_harga }}</td>
          <td>{{ $barang->total_harga }}</td>
          <td>{{ $barang->description }}</td>
        </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="4">Mengetahui</td>
          <td colspan="2">&nbsp;</td>
          <td colspan="4">PAINAN, {{ date('d M Y') }}</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">Ir. Erizon, MT <br> NIP. 19630323 199003 1 005	</td>
          <td colspan="2"></td>
          <td colspan="4">WETRI MULYADEVITA, A.Md <br> NIP. 19800708 200902 2 003</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
