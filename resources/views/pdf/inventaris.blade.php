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
            <td colspan="7" style="text-align:right;"><strong>LAMPIRAN 33</strong></td>
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
            <td colspan="3" style="text-align:right; padding: 10px;">KODE LOKASI : ...</td>
          </tr>
          <tr>
            <td colspan="7" style="text-align:center; padding: 10px;"><h3>REKAPITULASI BUKU INVENTARIS<br>(REKAP HASIL SENSUS)</h3></td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>NO<br>URT</th>
          <th>GOLONGAN</th>
          <th>KODE <br> BIDANG <br> BARANG</th>
          <th>NAMA BIDANG BARANG</th>
          <th>JUMLAH BARANG</th>
          <th>JUMLAH HARGA <br> DLM RIBUAN <br> (Rp.)</th>
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
        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @php ($golongan=0)
        @foreach ($barangs as $barang)

        @if(($barang->golongan_barang_code) == $golongan)
          <tr>
            <td class="number">&nbsp;</td>
            <td class="number">&nbsp;</td>
            <td class="number">{{$barang->bidang_barang_code}}</td>
            <td>{{ $barang->bidang_barang_name }}</td>
            <td class="number">{{ $barang->total_barang }}</td>
            <td class="number">{{ number_format($barang->total_price) }}</td>
            <td>&nbsp;</td>
          </tr>
        @else
          @php ($golongan = $barang->golongan_barang_code)
          @php ($a++)
          <tr>
            <td class="number"><strong>{{$a}}</strong></td>
            <td class="number">{{$barang->golongan_barang_code}}</td>
            <td class="number">&nbsp;</td>
            <td><strong>{{ $barang->golongan_barang_name }}</strong></td>
            <td class="number">&nbsp;</td>
            <td class="number">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="number">&nbsp;</strong></td>
            <td class="number">&nbsp;</td>
            <td class="number">{{$barang->bidang_barang_code}}</td>
            <td>{{ $barang->bidang_barang_name }}</td>
            <td class="number">{{ $barang->total_barang }}</td>
            <td class="number">{{ number_format($barang->total_price) }}</td>
            <td>&nbsp;</td>
          </tr>
        @endif
        @endforeach
      </tbody>
      <thead>
        <tr>
          <th colspan="3">&nbsp;</th>
          <th>Total</th>
          <th class="number">{{ $barangs->sum('total_barang')}}</th>
          <th class="number">{{ number_format($barangs->sum('total_price'))}}</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
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
