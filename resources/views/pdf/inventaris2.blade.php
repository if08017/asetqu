<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <style>
    table{
      border-collapse: collapse;
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
  </style>
</head>
<body>
    <div class="table-responsive report">
      <table class="table table-striped table-bordered">
      <thead style="text-align:center">
        <tr>
          <th>No</th>
          <th>Kode Karang</th>
          <th>Nama Barang</th>
          <th>Merek/Tipe</th>
          <th>Ukuran</th>
          <th>Bahan</th>
          <th>Tahun Pembuatan</th>
          <th>Nomor/Identitas</th>
          <th>Asal Usul</th>
          <th>Harga</th>
          <th>Pengguna</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        @php ($a=0)
        @foreach ($barangs as $barang)
        @php ($a++)
        <tr>
          <td><strong>{{$a}}</strong></td>
          <td class="number">{{ $barang->code }}</td>
          <td>{{ $barang->name }}</td>
          <td>{{ $barang->brand }}</td>
          <td class="number">{{ $barang->size }}</td>
          <td>{{ $barang->material }}</td>
          <td>{{ $barang->year_created }}</td>
          <td>{{ $barang->number }}</td>
          <td>{{ $barang->source }}</td>
          <td>{{ $barang->price }}</td>
          <td>{{ $barang->pegawai_name }}</td>
          <td>{{ $barang->description }}</td>
        </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="4">Mengetahui</td>
          <td colspan="4">&nbsp;</td>
          <td colspan="4">PAINAN, 09 Desember 2016</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
          <td colspan="4">&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">Ir. Erizon, MT <br> NIP. 19630323 199003 1 005	</td>
          <td colspan="4"></td>
          <td colspan="4">WETRI MULYADEVITA, A.Md <br> NIP. 19800708 200902 2 003</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
