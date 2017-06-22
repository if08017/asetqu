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
            <td colspan="12" style="text-align:center; padding: 10px;">DAFTAR BARANG INVENTARIS<br>ASET AKTIF dan ASET DALAM USULAN PENGHAPUSAN<br>{{ date('Y')}}</td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Merek/Tipe</th>
          <th>Ukuran</th>
          <th>Bahan</th>
          <th>Tahun Pembuatan</th>
          <th>Nomor/Identitas</th>
          <th>Asal Usul</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Pengguna</th>
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
          <td>{{ $barang->inventori_barang_brand }}</td>
          <td class="number">{{ $barang->size }}</td>
          <td>{{ $barang->material }}</td>
          <td class="number">{{ $barang->year_created }}</td>
          <td>{{ $barang->number }}</td>
          <td>{{ $barang->source }}</td>
          <td class="number">{{ number_format($barang->price) }}</td>
          <td>{{ $barang->status_name }}</td>
          <td>{{ $barang->pegawai_name }}</td>
          <td>{{ $barang->description }}</td>
        </tr>
        @endforeach

        @php ($b=$a)
        @foreach ($barangs2 as $barang2)
        @php ($b++)
        <tr>
          <td class="number"><strong>{{$b}}</strong></td>
          <td class="number">{{ $barang2->code }}</td>
          <td>{{ $barang2->name }}</td>
          <td>{{ $barang2->brand }}</td>
          <td class="number">{{ $barang2->size }}</td>
          <td>{{ $barang2->material }}</td>
          <td class="number">{{ $barang2->year_created }}</td>
          <td>{{ $barang2->number }}</td>
          <td>{{ $barang2->source }}</td>
          <td class="number">{{ number_format($barang2->price) }}</td>
          <td>{{ $barang2->status_name }}</td>
          <td>{{ $barang2->pegawai_name }}</td>
          <td>{{ $barang2->description }}</td>
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
