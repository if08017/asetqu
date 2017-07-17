<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventaris tahunan</title>
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
            <td colspan="13" style="text-align:right;"><strong>LAMPIRAN 33</strong></td>
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
            <td colspan="9" style="text-align:right; padding: 10px;">KODE LOKASI : ...</td>
          </tr>
          <tr>
            <td colspan="13" style="text-align:center; padding: 10px;"><h3>REKAPITULASI BUKU INVENTARIS<br>(REKAP HASIL SENSUS)</h3></td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th rowspan="2">NO<br>URT</th>
          <th rowspan="2">NAMA BARANG</th>
          <th rowspan="2">MEREK</th>

          <th rowspan="2">UKURAN</th>
          <th rowspan="2">BAHAN</th>
          <th rowspan="2">TAHUN<br>PEMBUATAN</th>
          <th rowspan="2">KODE<br>BARANG</th>
          <th rowspan="2">JUMLAH<br>BARANG</th>
          <th rowspan="2">SATUAN</th>
          <th colspan="3">KEADAAN BARANG</th>
          <th rowspan="2">KETERANGAN</th>
        </tr>
        <tr>
          <th>BAIK<br>(B)</th><th>KURANG BAIK<br>(KB)</th><th>RUSAK BERAT<br>(RB)</th>
        </tr>
        <tr>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
          <th>11</th>
          <th>12</th>
          <th>13</th>

        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @php ($golongan=0)
        @foreach ($barangs as $barang)
          @php ($a++)
          <tr>
            <td class="number"><strong>{{$a}}</strong></td>
            <td class="number">{{ $barang->barang_name }}</td>
            <td>{{ $barang->barang_brand }}</td>
            <!-- <td>{{ $barang->color }}</td> -->
            <td class="number">{{ $barang->size }}</td>
            <td>{{ $barang->material }}</td>
            <td class="number">{{ $barang->created_year }}</td>
            <td>{{ $barang->barang_code }}</td>
            <td>{{ $barang->jumlah_barang }}</td>
            <td>{{ $barang->barang_satuan_name }}</td>
            <td>{{ $barang->total_b }}</td>
            <td>{{ $barang->total_kb }}</td>
            <td>{{ $barang->total_rb }}</td>
            <td>{{ $barang->description }}</td>
          </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="5">MENGETAHUI <br> KEPALA SKPD</td>
          <td colspan="3">&nbsp;</td>
          <td colspan="5">........................................... <br> PENGURUS BARANG</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">(...........................................) <br> NIP...........................................</td>
          <td colspan="3"></td>
          <td colspan="5">(...........................................) <br> NIP...........................................</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
