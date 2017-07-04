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
            <td colspan="7" style="text-align:center; padding: 10px;">DAFTAR BARANG INVENTARIS<br>{{ date('Y')}}</td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>No</th>
          <th>Kode Golongan</th>
          <th>Kode Bidang</th>
          <th>Nama Bidang Barang</th>
          <th>Jumlah Barang</th>
          <th>Jumlah Harga Dalam Ribuan(Rp.)</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @foreach ($barangs as $barang)
        @php ($a++)
        <tr>
          <td class="number"><strong>{{$a}}</strong></td>
          <td class="number">{{ $barang->golongan_barang_code}}</td>
          <td class="number">{{ $barang->bidang_barang_code }}</td>
          <td><strong>{{ $barang->bidang_barang_name }}</strong><br>{{ $barang->kelompok_barang_name }}</td>
          <td class="number">{{ $barang->total_barang }}</td>
          <td class="number">{{ number_format($barang->total_price) }}</td>
          <td>{{ $barang->status_name}},{{$barang->kondisi_name  }}</td>
        </tr>
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
          <td colspan="3">Mengetahui</td>
          <td colspan="1">&nbsp;</td>
          <td colspan="3">PAINAN, {{ date('d M Y')}}</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td colspan="1">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">Ir. Erizon, MT <br> NIP. 19630323 199003 1 005	</td>
          <td colspan="1"></td>
          <td colspan="3">WETRI MULYADEVITA, A.Md <br> NIP. 19800708 200902 2 003</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
