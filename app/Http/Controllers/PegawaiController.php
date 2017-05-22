<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Unitkerja;
use App\Models\Satuankerja;
use App\Models\Provinsi;
use App\Models\Kabupaten;

class PegawaiController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $pegawais = Pegawai::join('jabatan','jabatan_id','=','jabatan.id')
                ->select('pegawai.*','jabatan.name as jabatan_name')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
    //dd($kategoris);
    if(!$pegawais)
    abort(404);
    return view('pegawai', ['pegawais' => $pegawais]);
  }
  public function view($id){
    //dd($id);
    $pegawai = Pegawai::join('jabatan','jabatan_id','=','jabatan.id')
                ->join('unit_kerja','unit_kerja_id','=','unit_kerja.id')
                ->join('satuan_kerja','satuan_kerja_id','=','satuan_kerja.id')
                ->join('provinsi','provinsi_id','=','provinsi.id')
                ->join('kabupaten','kabupaten_id','=','kabupaten.id')
                ->select('pegawai.*','jabatan.name as jabatan_name','unit_kerja.name as unit_kerja_name','satuan_kerja.name as satuan_kerja_name','provinsi.name as provinsi_name','kabupaten.name as kabupaten_name')
                ->find($id);
    //dd($pegawai);
    return view('pegawaiview', ['pegawai' => $pegawai]);
  }
  public function edit($id){
    $jabatans = Jabatan::orderBy('name', 'asc')->get();
    $unit_kerjas = Unitkerja::orderBy('name', 'asc')->get();
    $satuan_kerjas = Satuankerja::orderBy('name', 'asc')->get();
    $provinsis = Provinsi::orderBy('name', 'asc')->get();
    $kabupatens = Kabupaten::orderBy('name', 'asc')->get();
    $pegawai = Pegawai::join('jabatan','jabatan_id','=','jabatan.id')
                ->join('unit_kerja','unit_kerja_id','=','unit_kerja.id')
                ->join('satuan_kerja','satuan_kerja_id','=','satuan_kerja.id')
                ->join('provinsi','provinsi_id','=','provinsi.id')
                ->join('kabupaten','kabupaten_id','=','kabupaten.id')
                ->select('pegawai.*','jabatan.name as jabatan_name','unit_kerja.name as unit_kerja_name','satuan_kerja.name as satuan_kerja_name','provinsi.name as provinsi_name','kabupaten.name as kabupaten_name')
                ->find($id);
    return view('pegawaiedit', ['pegawai' => $pegawai, 'unit_kerjas' => $unit_kerjas, 'provinsis' => $provinsis, 'kabupatens' => $kabupatens, 'jabatans' => $jabatans]);
  }
  public function update($id, Request $request){
    //dd($request);
    $pegawai = Pegawai::find($id);
    $pegawai->nip = $request->nip;
    $pegawai->name = $request->name;
    $pegawai->contact = $request->contact;
    $pegawai->email = $request->email;
    $pegawai->address = $request->address;
    $pegawai->sex = $request->sex;
    $pegawai->birthday = $request->birthday;
    $pegawai->jabatan_id = $request->jabatan;
    $pegawai->unit_kerja_id = $request->unitkerja;
    $pegawai->satuan_kerja_id = $request->satuankerja;
    $pegawai->provinsi_id = $request->provinsi;
    $pegawai->kabupaten_id = $request->kabupaten;
    $pegawai->save();
    return redirect('/pegawai');
  }
  public function add(){
    $jabatans = Jabatan::orderBy('name', 'asc')->get();
    $unit_kerjas = Unitkerja::orderBy('name', 'asc')->get();
    $satuan_kerjas = Satuankerja::orderBy('name', 'asc')->get();
    $provinsis = Provinsi::orderBy('name', 'asc')->get();
    $kabupatens = Kabupaten::orderBy('name', 'asc')->get();
    return view('pegawaiadd', ['jabatans' => $jabatans, 'unit_kerjas' => $unit_kerjas, 'satuan_kerjas' => $satuan_kerjas, 'provinsis' => $provinsis, 'kabupatens' => $kabupatens]);
  }
  public function insert(Request $request){
    //dd($request);
    $insert = Pegawai::create([
      'nip' => $request->nip,
      'name' => $request->name,
      'contact' => $request->contact,
      'email' => $request->email,
      'address' => $request->address,
      'sex' => $request->sex,
      'birthday' => $request->birthday,
      'jabatan_id' => $request->jabatan,
      'unit_kerja_id' => $request->unitkerja,
      'satuan_kerja_id' => $request->satuankerja,
      'provinsi_id' => $request->provinsi,
      'kabupaten_id' => $request->kabupaten
    ]);
    //dd($insert);

    return redirect('/pegawai');
  }
  public function delete($id){
    Pegawai::destroy($id);
    return redirect('/pegawai');
  }
  public function kabupaten(Request $request){
    $kabupatens = Kabupaten::where('provinsi_id', $request->kab_id)->get();
    return \Response::json($kabupatens);
  }
  public function satuan_kerja(Request $request){
    $satuan_kerjas = Satuankerja::where('unit_kerja_id', $request->satuan_id)->get();
    return \Response::json($satuan_kerjas);
  }
}
