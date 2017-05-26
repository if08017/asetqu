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
          <td><strong>{{$a}}</strong></td>
          <td class="number">{{ $barang->golongan_barang_code}}</td>
          <td class="number">{{ $barang->bidang_barang_code }}</td>
          <td><strong>{{ $barang->bidang_barang_name }}</strong><br>{{ $barang->kelompok_barang_name }}</td>
          <td class="number">{{ $barang->total_barang }}</td>
          <td class="number">{{ number_format($barang->total_price) }}</td>
            <!-- @foreach ($golongans as $golongan)
              <td class="number">{{ number_format($barangs->where('golongan_barang_code',$golongan->golongan_barang_code)->sum('total_price')) }}</td>
            @endforeach -->
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
    </table>
    </div>
</body>
</html>
