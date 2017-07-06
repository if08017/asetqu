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
            <td colspan="10" style="text-align:right;"><strong>LAMPIRAN 37</strong></td>
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
            <td colspan="6" style="text-align:right; padding: 10px;">KODE LOKASI : ...</td>
          </tr>
          <tr>
            <td colspan="10" style="text-align:center; padding: 10px;"><h3>DAFTAR USULAN BARANG YANG AKAN DIHAPUS</h3></td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>No</th>
          <th>NO. KODE BARANG</th>
          <th>NAMA BARANG</th>
          <th>NO. KODE LOKASI</th>
          <th>MEREK/TYPE</th>
          <th>DOKUMEN<BR> KEPEMILIKAN</th>
          <th>TAHUN <br> BELI/PEMBELIAN</th>
          <th>HARGA PEROLEHAN</th>
          <th>KEADAN BARANG <br>(B,KB,RB)</th>
          <th>KETERANGAN</th>
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
          <td>{{ $barang->number }}</td>
          <td>{{ $barang->buy_year }}</td>
          <td>{{ $barang->price }}</td>
          @if(($barang->kondisi_barang_id) == 1)
            <td>B</td>
          @elseif(($barang->kondisi_barang_id) == 2)
            <td>KB</td>
          @elseif(($barang->kondisi_barang_id) == 3)
            <td>RB</td>
          @endif
          <td>{{ $barang->description }}</td>
        </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="3">MENGETAHUI <br> KEPALA SKPD</td>
          <td colspan="4">&nbsp;</td>
          <td colspan="3">........................................... <br> PENGURUS BARANG</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="4">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">(...........................................) <br> NIP...........................................</td>
          <td colspan="4"></td>
          <td colspan="3">(...........................................) <br> NIP...........................................</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
