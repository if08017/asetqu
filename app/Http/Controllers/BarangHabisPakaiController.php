<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Image;

use App\Models\Barang;
use App\Models\Golongan;
use App\Models\Bidang;
use App\Models\Kelompok;
use App\Models\Subkelompok;
use App\Models\Ruangan;
use App\Models\Pegawai;
use App\Models\Satuan;
use App\Models\Kondisi;
use App\Models\Status;
use App\Models\Mutation;
use App\Models\Jabatan;
use App\Models\Unitkerja;
use App\Models\Baranghabispakai;

class BarangHabisPakaiController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $mutations = Mutation::orderBy('name','desc')->get();
    // dd($mutations);
    $barangs = Baranghabispakai::join('barang','barang_habis_pakai.barang_id','=','barang.id')
      ->join('golongan_barang','barang_habis_pakai.golongan_barang_id','=','golongan_barang.id')
      ->join('bidang_barang','barang_habis_pakai.bidang_barang_id','=','bidang_barang.id')
      ->join('kelompok_barang','barang_habis_pakai.kelompok_barang_id','=','kelompok_barang.id')
      ->join('sub_kelompok_barang','barang_habis_pakai.sub_kelompok_barang_id','=','sub_kelompok_barang.id')
      ->join('mutation','barang_habis_pakai.mutation_id','=','mutation.id')
      ->join('pegawai','barang_habis_pakai.pegawai_id','=','pegawai.id')
      ->join('unit_kerja','barang_habis_pakai.unit_kerja_id','=','unit_kerja.id')
      ->select('barang_habis_pakai.*','unit_kerja.name as unit_kerja_name','pegawai.name as pegawai_name','mutation.name as mutation_name','barang.name as barang_name','barang.code as barang_code','golongan_barang.name as golongan_barang_name','bidang_barang.name as bidang_barang_name','kelompok_barang.name as kelompok_barang_name','sub_kelompok_barang.name as sub_kelompok_barang_name')
      ->orderBy('created_at', 'desc')->paginate(13);
    return view('bhp', ['barangs'=>$barangs,'mutations'=>$mutations]);
  }
  public function bhp_add(){
    $mutations = Mutation::orderBy('name','desc')->get();
    $unit_kerjas = Unitkerja::orderBy('name','desc')->get();
    $pegawais = Pegawai::orderBy('name','desc')->get();
    $jabatans = Jabatan::orderBy('name','desc')->get();
    $barangs = Barang::orderBy('name','desc')->get();
    $satuans = Satuan::orderBy('name', 'asc')->get();
    $golongans = Golongan::orderBy('name', 'asc')->get();
    $bidangs = Bidang::orderBy('name', 'asc')->get();
    $kelompoks = Kelompok::orderBy('name', 'asc')->get();
    $subkelompoks = Subkelompok::orderBy('name', 'asc')->get();
    return view('bhpadd',['mutations'=>$mutations,'unit_kerjas'=>$unit_kerjas,'pegawais'=>$pegawais,'jabatans'=>$jabatans,'satuans'=>$satuans,'barangs'=>$barangs,'golongans' => $golongans, 'bidangs' => $bidangs, 'kelompoks' => $kelompoks, 'subkelompoks' => $subkelompoks]);
  }
  public function bhp_insert(Request $request){
    // dd ($request);
    Baranghabispakai::create([
      'mutation_id'=> $request->mutasi,
      'golongan_barang_id' => $request->golongan,
      'bidang_barang_id' => $request->bidang,
      'kelompok_barang_id' => $request->kelompok,
      'sub_kelompok_barang_id' => $request->subkelompok,
      'kwitansi_id'=> $request->po_id,
      'unit_kerja_id'=> $request->unit_kerja,
      'pegawai_id' => $request->pegawai,
      'jabatan_id' => $request->jabatan,
      'barang_id' => $request->barang,
      'quantity' => $request->quantity,
      'satuan_name' => $request->satuan,
      'price' => $request->price,
      'sum' => $request->sum,
      'source' => $request->source,
      'ruangan_id' => $request->ruangan,
      'kondisi_id' => $request->kondisi,
      'satuan_name' => $request->satuan,
      'description' => $request->description,
      'created_at' => $request->date,
      '_token' => $request->_token,
    ]);
    return redirect('/bhp');
  }
}
