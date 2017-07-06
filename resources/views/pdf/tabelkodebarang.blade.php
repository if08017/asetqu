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
            <td colspan="6" style="text-align:right;"><strong>LAMPIRAN 41</strong></td>
          </tr>
          <tr>
            <td colspan="6" style="text-align:center; padding: 10px;"><h2>TABEL KODE BARANG DAERAH</h2></td>
          </tr>
        </thead>
      <thead style="text-align:center">
        <tr>
          <th>GOLONGAN</th>
          <th>BIDANG</th>
          <th>KELOMPOK</th>
          <th>SUB KELOMPOK</th>
          <th>KODE BARANG</th>
          <th>URAIAN</th>
        <tr>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
        </tr>
      </thead>
      <tbody>
        @php ($golongan=0)
        @php ($bidang=0)
        @php ($kelompok=0)
        @php ($subkelompok=0)
        @foreach ($barangs as $barang)
          @if(($barang->golongan_barang_code) == $golongan)
            @if(($barang->bidang_barang_code) == $bidang)
              @if(($barang->kelompok_barang_code) == $kelompok)
                @if(($barang->sub_kelompok_barang_code) == $subkelompok)
                  <tr>
                    <td class="number">{{$barang->golongan_barang_code}}</td>
                    <td class="number">{{$barang->bidang_barang_code}}</td>
                    <td class="number">{{$barang->kelompok_barang_code}}</td>
                    <td class="number">{{$barang->sub_kelompok_barang_code}}</td>
                    <td class="number">{{$barang->code}}</td>
                    <td>{{$barang->name}}</td>
                  </tr>
                @else
                  @php ($subkelompok = $barang->sub_kelompok_barang_code)
                  <tr>
                    <td class="number">{{$barang->golongan_barang_code}}</td>
                    <td class="number">{{$barang->bidang_barang_code}}</td>
                    <td class="number">{{$barang->kelompok_barang_code}}</td>
                    <td class="number">{{$barang->sub_kelompok_barang_code}}</td>
                    <td>*</td>
                    <td><strong>{{$barang->sub_kelompok_barang_name}}</strong></td>
                  </tr>
                @endif
              @else
                @php ($kelompok = $barang->kelompok_barang_code)
                <tr>
                  <td class="number">{{$barang->golongan_barang_code}}</td>
                  <td class="number">{{$barang->bidang_barang_code}}</td>
                  <td class="number">{{$barang->kelompok_barang_code}}</td>
                  <td>*</td>
                  <td>*</td>
                  <td><strong>{{$barang->kelompok_barang_name}}</strong></td>
                </tr>
              @endif
            @else
              @php ($bidang = $barang->bidang_barang_code)
              <tr>
                <td class="number">{{$barang->golongan_barang_code}}</td>
                <td class="number">{{$barang->bidang_barang_code}}</td>
                <td>*</td>
                <td>*</td>
                <td>*</td>
                <td><strong>{{$barang->bidang_barang_name}}</strong></td>
              </tr>
            @endif
          @else
            @php ($golongan = $barang->golongan_barang_code)
            <tr>
              <td class="number">{{$barang->golongan_barang_code}}</td>
              <td>*</td>
              <td>*</td>
              <td>*</td>
              <td>*</td>
              <td><strong>{{$barang->golongan_barang_name}}</strong></td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    </div>
</body>
</html>
