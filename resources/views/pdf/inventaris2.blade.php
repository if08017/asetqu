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
        @foreach ($barangaktifs as $barangaktif)
        @php ($a++)
        <tr>
          <td class="number"><strong>{{$a}}</strong></td>
          <td class="number">{{ $barangaktif->barang_code }}</td>
          <td>{{ $barangaktif->barang_name }}</td>
          <td>{{ $barangaktif->barang_brand }}</td>
          <td class="number">{{ $barangaktif->size }}</td>
          <td>{{ $barangaktif->material }}</td>
          <td class="number">{{ $barangaktif->created_year }}</td>
          <td>{{ $barangaktif->number }}</td>
          <td>{{ $barangaktif->source }}</td>
          <td class="number">{{ number_format($barangaktif->price) }}</td>
          <td>{{ $barangaktif->status_barang_name }}</td>
          <td>{{ $barangaktif->pegawai_name }}</td>
          <td>{{ $barangaktif->description }}</td>
        </tr>
        @endforeach
        @foreach ($barangusulans as $barangusulan)
        @php ($a++)
        <tr>
          <td class="number"><strong>{{$a}}</strong></td>
          <td class="number">{{ $barangusulan->barang_code }}</td>
          <td>{{ $barangusulan->barang_name }}</td>
          <td>{{ $barangusulan->barang_brand }}</td>
          <td class="number">{{ $barangusulan->size }}</td>
          <td>{{ $barangusulan->material }}</td>
          <td class="number">{{ $barangusulan->created_year }}</td>
          <td>{{ $barangusulan->number }}</td>
          <td>{{ $barangusulan->source }}</td>
          <td class="number">{{ number_format($barangusulan->price) }}</td>
          <td>{{ $barangusulan->status_mutasi_name }}</td>
          <td>{{ $barangusulan->pegawai_name }}</td>
          <td>{{ $barangusulan->description }}</td>
        </tr>
        @endforeach
      </tbody>
      <thead class="signature">
        <tr>
          <td colspan="5">Mengetahui</td>
          <td colspan="3">&nbsp;</td>
          <td colspan="5">PAINAN, {{ date(' d M Y')}}</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">Ir. Erizon, MT <br> NIP. 19630323 199003 1 005	</td>
          <td colspan="3"></td>
          <td colspan="5">WETRI MULYADEVITA, A.Md <br> NIP. 19800708 200902 2 003</td>
        </tr>
      </thead>
    </table>
    </div>
</body>
</html>
