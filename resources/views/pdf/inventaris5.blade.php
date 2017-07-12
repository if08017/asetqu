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
            <td colspan="10" style="text-align:right;"><strong>LAMPIRAN X</strong></td>
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
            <td colspan="10" style="text-align:center; padding: 10px;"><h3>DAFTAR BARANG INVENTARIS<br>ASET DIMILIKI OLEH {{ $pegawai->name }}</h3></td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>NO</th>
          <th>KODE BARANG</th>
          <th>NAMA BARANG</th>
          <th>MEREK / TIPE</th>
          <th>NOMOR / IDENTITAS</th>
          <th>JUMLAH UNIT</th>
          <th>SATUAN</th>
          <th>GOLONGAN</th>
          <th>KEADAN BARANG <br>(B,KB,RB)</th>
          <th>KETERANGAN</th>
        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @foreach ($barangmasuks as $barangmasuk)
        @php ($a++)
        <tr>
          <td class="number"><strong>{{$a}}</strong></td>
          <td class="number">{{ $barangmasuk->barang_code }}</td>
          <td>{{ $barangmasuk->barang_name }}</td>
          <td>{{ $barangmasuk->barang_brand }}</td>
          <td>{{ $barangmasuk->number }}</td>
          <td class="number">{{ $barangmasuk->quantity }}</td>
          <td>{{ $barangmasuk->barang_satuan_name }}</td>
          <td>{{ $barangmasuk->golongan_name }}</td>
          @if(($barangmasuk->kondisi_barang_id) == 1)
            <td>B</td>
          @elseif(($barangmasuk->kondisi_barang_id) == 2)
            <td>KB</td>
          @elseif(($barangmasuk->kondisi_barang_id) == 3)
            <td>RB</td>
          @endif
          <td>Barang Masuk</td>
        </tr>
        @endforeach

        @foreach ($barangkeluars as $barangkeluar)
        @php ($a++)
        <tr>
          <td class="number"><strong>{{$a}}</strong></td>
          <td class="number">{{ $barangkeluar->barang_code }}</td>
          <td>{{ $barangkeluar->barang_name }}</td>
          <td>{{ $barangkeluar->barang_brand }}</td>
          <td>{{ $barangkeluar->number }}</td>
          <td class="number">{{ $barangkeluar->quantity }}</td>
          <td>{{ $barangkeluar->barang_satuan_name }}</td>
          <td>{{ $barangkeluar->golongan_name }}</td>
          @if(($barangkeluar->kondisi_barang_id) == 1)
            <td>B</td>
          @elseif(($barangkeluar->kondisi_barang_id) == 2)
            <td>KB</td>
          @elseif(($barangkeluar->kondisi_barang_id) == 3)
            <td>RB</td>
          @endif
          <td>Barang Mutasi</td>
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
