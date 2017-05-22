<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Golongan;
use App\Models\Bidang;

class GolonganController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $golongans2 = Golongan::orderBy('name', 'asc')->get();
    $golongans = Golongan::orderBy('name', 'asc')->paginate(10,['*'], 'golongankerja');
    $bidangs = Bidang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
              ->select('bidang_barang.*','golongan_barang.name as golongan_barang_name')
              ->orderBy('name', 'asc')->paginate(10,['*'], 'bidangkerja');
    //dd($bidangs);
    return view('golongan', ['golongans' => $golongans, 'golongans2' => $golongans2, 'bidangs' => $bidangs]);
  }
  public function add(){
    return view('golonganadd');
  }
  public function insert(Request $request){
    Golongan::create([
      'code' => $request->code,
      'name' => $request->name,
      'status' => $request->status
    ]);
    //dd($request);
    return redirect('/barang/golongan');
  }
  public function edit($id){
    $golongans = Golongan::find($id);
    //dd($golongans);
    return view('golonganedit', ['golongans' => $golongans]);
  }

  public function update($id, Request $request){
    //dd($request);
    $golongans = Golongan::find($id);
    $golongans->code = $request->code;
    $golongans->name = $request->name;
    $golongans->status = $request->status;
    $golongans->save();
    return redirect('/barang/golongan');
  }
  public function golongan_delete($id){
    Golongan::destroy($id);
    return redirect('/barang/golongan');
  }
  public function error($id){
    abort(404);
  }
  public function bidang_insert(Request $request){
    Bidang::create([
      'code' => $request->code,
      'name' => $request->name,
      'status' => $request->status,
      'golongan_barang_id' => $request->golongan
    ]);
    //dd($request);
    return redirect('/barang/golongan');
  }
  public function bidang_edit($id){
    $golonganbarangs = Golongan::orderBy('name', 'asc')->get();
    //$satuankerja = Satuankerja::find($id);
    $bidangbarang = Bidang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
                    ->select('bidang_barang.*','golongan_barang.name as golongan_barang_name')
                    ->find($id);
    return view('bidangbarangedit', ['golonganbarangs' => $golonganbarangs, 'bidangbarang' => $bidangbarang]);
  }
  public function bidang_update($id, Request $request){
    //dd($request);
    $bidangbarang = Bidang::find($id);
    $bidangbarang->code = $request->code;
    $bidangbarang->name = $request->name;
    $bidangbarang->golongan_barang_id = $request->golonganbarang;
    $bidangbarang->save();
    return redirect('/barang/golongan');
  }
  public function bidang_delete($id){
    Bidang::destroy($id);
    return redirect('/barang/bidang');
  }
}
