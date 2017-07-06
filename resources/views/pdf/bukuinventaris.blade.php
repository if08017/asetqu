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
            <td colspan="14" style="text-align:right;"><strong>LAMPIRAN 32</strong></td>
          </tr>
          <tr>
            <td colspan="15" style="text-align:center; padding: 10px;"><h2>BUKU INVENTARIS</h2></td>
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
            <td colspan="11" style="text-align:right; padding: 10px;">KODE LOKASI : ...</td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th colspan="2">NOMOR</th>
          <th colspan="4">SPESIFIKASI BARANG</th>
          <th rowspan="2">BAHAN</th>
          <th rowspan="2">ASAL/CARA<BR>PEROLEHAN BARANG</th>
          <th rowspan="2">TAHUN<BR>PEROLEHAN</th>
          <th rowspan="2">UKURAN BARANG/<BR>KONTRUKSI(P,S,D)</th>
          <th rowspan="2">SATUAN</th>
          <th rowspan="2">KEADAAN BARANG<BR>B/KB/RB</th>
          <th colspan="2">JUMLAH</th>
          <th rowspan="2">KETERANGAN</th>
        </tr>
        <tr>
          <th>NO<br>URT</th>
          <th>KODE BARANG</th>
          <th>REGISTER</th>
          <th>NAMA/JENIS BARANG</th>
          <th>MEREK/TYPE</th>
          <th>NO. SERTIFIKAT<BR> NO. PABRIK<BR> NO. CHASIS<BR> NO. MESIN</th>
          <th>BARANG</th>
          <th>HARGA</th>
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
          <th>14</th>
          <th>15</th>
        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @php ($golongan=0)
        @foreach ($barangs as $barang)
          @php ($a++)
          <tr>
            <td class="number"><strong>{{$a}}</strong></td>
            <td>{{$barang->barang_code}}</td>
            <td>{{$barang->barang_name}}</td>
            <td>{{$barang->barang_name}}</td>
            <td>{{$barang->barang_brand}}</td>
            <td class="number">{{$barang->number}}</td>
            <td>{{ $barang->material }}</td>
            <td>{{ $barang->source }}</td>
            <td>{{ $barang->buy_year }}</td>
            <td class="number">{{ $barang->size }}</td>
            <td>{{ $barang->barang_satuan_name }}</td>
            @if(($barang->kondisi_barang_id) == 1)
              <td>B</td>
            @elseif(($barang->kondisi_barang_id) == 2)
              <td>KB</td>
            @elseif(($barang->kondisi_barang_id) == 3)
              <td>RB</td>
            @endif
            <td class="number">{{ number_format($barang->quantity) }}</td>
            <td class="number">{{ number_format($barang->price) }}</td>
            <td>&nbsp;</td>
          </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="5">MENGETAHUI <br> KEPALA SKPD</td>
          <td colspan="5">&nbsp;</td>
          <td colspan="5">........................................... <br> PENGURUS BARANG</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
          <td colspan="5">&nbsp;</td>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">(...........................................) <br> NIP...........................................</td>
          <td colspan="5">&nbsp;</td>
          <td colspan="5">(...........................................) <br> NIP...........................................</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
