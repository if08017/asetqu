<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\Models\Barang;
use App\Models\Bidang;
use App\Models\Golongan;
use App\Models\Kelompok;
use App\Models\Subkelompok;
use App\Models\Jabatan;
use App\Models\Kabupaten;
use App\Models\Kondisi;
use App\Models\Mutation;
use App\Models\Pegawai;
use App\Models\Provinsi;
use App\Models\Receipt;
use App\Models\Ruangan;
use App\Models\Satuan;
use App\Models\Satuankerja;
use App\Models\Status;
use App\Models\Unitkerja;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $satuans = Satuan::pluck('name')->all();
      $kondisis = Kondisi::pluck('name')->all();
      $status = Status::pluck('name')->all();
      $ruangans = Ruangan::pluck('id')->all();
      $pegawais = Pegawai::pluck('id')->all();
      $golongans = Golongan::pluck('id')->all();
      $bidangs = Bidang::pluck('id')->all();
      $kelompoks = Kelompok::pluck('id')->all();
      $subkelompoks = Subkelompok::pluck('id')->all();
      $mutations = Mutation::pluck('id')->all();
      $receipts = Receipt::pluck('id')->all();

      for ($i=0; $i < 100; $i++) {
        $barangs = Barang::create([
            'code' => rand(1,10000),
            'name' => $faker->name,
            'number' => rand(1,300),
            'description' => str_random(20),
            'price' => $faker->randomNumber(2),
            'quantity' => rand(1,10),
            'tujuan' => str_random(20),
            'source' => $faker->company,
            'brand' => $faker->company,
            'size' => rand(1,10),
            'color' => str_random(5),
            'material' => str_random(5),
            'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
            'ruangan_id' => $faker->randomElement($ruangans),
            'pegawai_id' => $faker->randomElement($pegawais),
            'golongan_barang_id' => $faker->randomElement($golongans),
            'bidang_barang_id' => $faker->randomElement($bidangs),
            'kelompok_barang_id' => $faker->randomElement($kelompoks),
            'sub_kelompok_barang_id' => $faker->randomElement($subkelompoks),
            'mutation_id' => $faker->randomElement($mutations),
            'satuan_name' => $faker->randomElement($satuans),
            'kondisi_name' => $faker->randomElement($kondisis),
            'status_name' => $faker->randomElement($status),
        ]);
      }
    }
}
