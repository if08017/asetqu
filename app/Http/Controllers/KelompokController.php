<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Bidang;
use App\Models\Kelompok;
use App\Models\Subkelompok;

class KelompokController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $kelompokbarangs = Kelompok::join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
                     ->select('kelompok_barang.*','bidang_barang.name as bidang_barang_name')
                     ->orderBy('name', 'asc')->paginate(10,['*'], 'kelompokkerja');
    $subkelompokbarangs = Subkelompok::join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
                      ->select('sub_kelompok_barang.*','kelompok_barang.name as kelompok_barang_name')
                      ->orderBy('name', 'asc')->paginate(10,['*'], 'subkelompokkerja');
    $bidangs = Bidang::orderBy('name', 'asc')->get();
    $kelompokbarangs2 = Kelompok::orderBy('name', 'asc')->get();
    //dd($kelompokbarangs);
    return view('kelompok', ['subkelompokbarangs' => $subkelompokbarangs, 'kelompokbarangs' => $kelompokbarangs, 'kelompokbarangs2' => $kelompokbarangs2, 'bidangs' => $bidangs]);
  }
  public function kelompok_insert(Request $request){
    //dd ($request);
    Kelompok::create([
      'code' => $request->code,
      'name' => $request->name,
      //'status' => $request->status,
      'bidang_barang_id' => $request->bidang
    ]);
    //dd($request);
    return redirect('/barang/kelompok');
  }
  public function kelompok_edit($id){
    $kelompokbarang = Kelompok::join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
                    ->select('kelompok_barang.*','bidang_barang.name as bidang_barang_name')
                    ->find($id);
    $bidangbarangs = Bidang::orderBy('name', 'asc')->get();
    //$satuankerja = Satuankerja::find($id);

    return view('kelompokbarangedit', ['kelompokbarang' => $kelompokbarang, 'bidangbarangs' => $bidangbarangs]);
  }
  public function kelompok_update($id, Request $request){
    //dd($request);
    $kelompokbarang = Kelompok::find($id);
    $kelompokbarang->code = $request->code;
    $kelompokbarang->name = $request->name;
    $kelompokbarang->bidang_barang_id = $request->bidangbarang;
    $kelompokbarang->save();
    return redirect('/barang/kelompok');
  }
  public function kelompok_delete($id){
    Kelompok::destroy($id);
    return redirect('/barang/kelompok');
  }
  public function subkelompok_insert(Request $request){
    //dd ($request);
    Subkelompok::create([
      'code' => $request->code,
      'name' => $request->name,
      //'status' => $request->status,
      'kelompok_barang_id' => $request->kelompok
    ]);
    //dd($request);
    return redirect('/barang/subkelompok');
  }
  public function subkelompok_edit($id){
    $subkelompokbarang = Subkelompok::join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
                    ->select('sub_kelompok_barang.*','kelompok_barang.name as kelompok_barang_name')
                    ->find($id);
    $kelompokbarangs = Kelompok::orderBy('name', 'asc')->get();
    //$satuankerja = Satuankerja::find($id);
//dd($subkelompokbarang);
    return view('subkelompokbarangedit', ['subkelompokbarang' => $subkelompokbarang, 'kelompokbarangs' => $kelompokbarangs]);
  }
  public function subkelompok_update($id, Request $request){
    //dd($request);
    $subkelompokbarang = Subkelompok::find($id);
    $subkelompokbarang->code = $request->code;
    $subkelompokbarang->name = $request->name;
    $subkelompokbarang->kelompok_barang_id = $request->kelompokbarang;
    $subkelompokbarang->save();
    return redirect('/barang/subkelompok');
  }
  public function subkelompok_delete($id){
    Subkelompok::destroy($id);
    return redirect('/barang/subkelompok');
  }
}
