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
use App\Models\Receipt;

class BarangController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $barangs = Barang::join('sub_kelompok_barang','sub_kelompok_barang_id','=','sub_kelompok_barang.id')
            ->select('barang.*','sub_kelompok_barang.name as sub_kelompok_barang_name')
            ->orderBy('created_at', 'desc')->paginate(13);
    return view('barang', ['barangs' => $barangs]);
  }
  public function barang_view($id){
    $barang = Barang::join('sub_kelompok_barang','sub_kelompok_barang_id','=','sub_kelompok_barang.id')
                ->select('barang.*','sub_kelompok_barang.name as sub_kelompok_barang_name')
                ->find($id);
    return view('barangview', ['barang' => $barang]);
  }
  public function barang_edit($id){
    $subkelompoks = Subkelompok::orderBy('name', 'asc')->get();
    $barang = Barang::join('sub_kelompok_barang','sub_kelompok_barang_id','=','sub_kelompok_barang.id')
                ->select('barang.*','sub_kelompok_barang.name as sub_kelompok_barang_name')
                ->find($id);
    return view('barangedit', ['barang' => $barang, 'subkelompoks' => $subkelompoks]);
  }
  public function barang_delete($id){
    Barang::destroy($id);
    return redirect('/barang');
  }
  public function barang_add(){
    $subkelompoks = Subkelompok::orderBy('name', 'asc')->get();
    return view('barangadd',['subkelompoks' => $subkelompoks]);
  }
  public function barang_insert(Request $request){
    Barang::create([
      'code' => $request->code,
      'name' => $request->name,
      'description' => $request->description,
      'sub_kelompok_barang_id' => $request->subkelompok
    ]);
    return redirect('/barang');
  }
  public function barang_update($id, Request $request){
    $barang = Barang::find($id);
    $barang->code = $request->code;
    $barang->name = $request->name;
    $barang->description = $request->description;
    $barang->sub_kelompok_barang_id = $request->subkelompok;
    $barang->save();
    return redirect('/barang/'.$id.'/view');
  }
  public function bidang_barang(Request $request){
    //dd($request);
    $bidangbarangs = Bidang::where('golongan_barang_id', $request->bidang_id)->get();
    return \Response::json($bidangbarangs);
  }
  public function mutation_barang(Request $request){
    // dd($request);
    $barangs = Barang::where('code', $request->barang_code)->get();
    // dd($barangs);
    return \Response::json($barangs);
  }
  public function kelompok_barang(Request $request){
    //dd($request);
    $kelompokbarangs = Kelompok::where('bidang_barang_id', $request->kelompok_id)->get();
    return \Response::json($kelompokbarangs);
  }
  public function sub_kelompok_barang(Request $request){
    //dd($request);
    $subkelompokbarangs = Subkelompok::where('kelompok_barang_id', $request->subkelompok_id)->get();
    return \Response::json($subkelompokbarangs);
  }



  public function mutation_view(){
    $golongans = Golongan::orderBy('name', 'asc')->get();
    $bidangs = Bidang::orderBy('name', 'asc')->get();
    $kelompoks = Kelompok::orderBy('name', 'asc')->get();
    $subkelompoks = Subkelompok::orderBy('name', 'asc')->get();
    $ruangans = Ruangan::orderBy('name', 'asc')->get();
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $satuans = Satuan::orderBy('name', 'asc')->get();
    $kondisis = Kondisi::orderBy('name', 'asc')->get();
    $statuss = Status::orderBy('name', 'asc')->get();
    return view('mutation',['ruangans' => $ruangans, 'pegawais' => $pegawais]);
  }
  public function mutation_barang_insert(Request $request){
    // dd($request);
    Mutation::create([
      'barang_id' => $request->id,
      'pegawai_id' => $request->pegawai,
      'ruangan_id' => $request->ruangan,
      'quantity' => $request->quantity,
    ]);
    return redirect('/barang/'.$request->id.'/view');
  }
  public function mutation_autocomplete(Request $request){
    //call by non ajax autocomplete
    if ($request->ajax()) {
      //dd($request);
      $barangs = Barang::where(function($query) use ($request){
                    $query->orWhere('barang.code','like','%'.$request->term.'%');
                    $query->orWhere('barang.name','like','%'.$request->term.'%');
                })
                ->orderBy('name', 'asc')
                ->take(5)
                ->get();
      //convert to Json
      $results = [];
      foreach ($barangs as $barang) {
        $results[] = ['id' => $barang->id, 'value' => $barang->code, 'label' => $barang->code.'-'.$barang->name];
      }
      //dd($results);
      return \Response::json($results);
      //return response()->json($results);
    }
  }
}
