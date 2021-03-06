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
            <td colspan="7" style="text-align:right;"><strong>LAMPIRAN X</strong></td>
          </tr>
          <tr>
            <td colspan="2">SKPD</td>
            <td>: ...</td>
          </tr>
          <tr>
            <td colspan="2">KAB/KOTA</td>
            <td>: ...</td>
          </tr>
          <tr>
            <td colspan="2">PROVINSI</td>
            <td>: ...</td>
            <td colspan="4" style="text-align:right; padding: 10px;">KODE LOKASI : ...</td>
          </tr>
          <tr>
            <td colspan="7" style="text-align:center; padding: 10px;"><h3>DAFTAR BARANG INVENTARIS<br>ASET PER JENIS/BIDANG BARANG</h3></td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Jumlah Unit</th>
          <th>Satuan</th>
          <th>Total Harga</th>
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
          <td>{{ $barang->jumlah_barang }}</td>
          <td>{{ $barang->barang_satuan_name }}</td>
          <td class="number">{{ number_format($barang->total_harga) }}</td>
          <td>{{ $barang->description }}</td>
        </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="3">MENGETAHUI <br> KEPALA SKPD</td>
          <td colspan="1">&nbsp;</td>
          <td colspan="3">........................................... <br> PENGURUS BARANG</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="1">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">(...........................................) <br> NIP...........................................</td>
          <td colspan="1"></td>
          <td colspan="3">(...........................................) <br> NIP...........................................</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
