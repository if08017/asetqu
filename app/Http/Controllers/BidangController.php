<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Ruangan;
use App\Models\Unitkerja;
use App\Models\Satuankerja;

class BidangController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $satuankerjas = Satuankerja::join('unit_kerja','unit_kerja_id','=','unit_kerja.id')
                    ->select('satuan_kerja.*','unit_kerja.name as unit_kerja_name')
                    ->orderBy('satuan_kerja.name', 'asc')->paginate(10,['*'], 'satuankerja');
    $unitkerjas = Unitkerja::orderBy('name', 'asc')->paginate(10,['*'], 'unitkerja');
    return view('bidangkerja', ['satuankerjas' => $satuankerjas, 'unitkerjas' => $unitkerjas]);
  }
  public function unit_kerja_insert(Request $request){
    Unitkerja::create([
      'name' => $request->name
    ]);
    return redirect('/bidang');
  }
  public function unit_kerja_edit($id){
    $unitkerja = Unitkerja::find($id);
    return view('unitkerjaedit', ['unitkerja' => $unitkerja]);
  }
  public function unit_kerja_update($id, Request $request){
    $unitkerja = Unitkerja::find($id);
    $unitkerja->name = $request->name;
    $unitkerja->save();
    return redirect('/bidang');
  }
  public function unit_kerja_delete($id){
    Unitkerja::destroy($id);
    return redirect('/bidang');
  }
  public function satuan_kerja_insert(Request $request){
    //dd($request);
    Satuankerja::create([
      'code' => $request->code,
      'name' => $request->name,
      'unit_kerja_id' => $request->unitkerja
    ]);
    return redirect('/bidang');
  }
  public function satuan_kerja_edit($id){
    $unitkerjas = Unitkerja::orderBy('name', 'asc')->paginate(10,['*'], 'unitkerja');
    //$satuankerja = Satuankerja::find($id);
    $satuankerja = Satuankerja::join('unit_kerja','unit_kerja_id','=','unit_kerja.id')
                    ->select('satuan_kerja.*','unit_kerja.name as unit_kerja_name')
                    ->find($id);
    return view('satuankerjaedit', ['satuankerja' => $satuankerja, 'unitkerjas' => $unitkerjas]);
  }
  public function satuan_kerja_update($id, Request $request){
    $satuankerja = Satuankerja::find($id);
    $satuankerja->code = $request->code;
    $satuankerja->name = $request->name;
    $satuankerja->unit_kerja_id = $request->unitkerja;
    $satuankerja->save();
    return redirect('/bidang');
  }
  public function satuan_kerja_delete($id){
    Satuankerja::destroy($id);
    return redirect('/bidang');
  }
  // public function index(){
  //   $bidangs = Bidang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
  //             ->select('bidang_barang.*','golongan_barang.name as golongan_barang_name')
  //             ->orderBy('bidang_barang.name', 'asc')->paginate(13);
  //   //dd($kategoris);
  //   if(!$bidangs)
  //   abort(404);
  //   return view('bidang', ['bidangs' => $bidangs]);
  //}
  // public function edit($id){
  //   $golonganbarangs = Golongan::orderBy('name', 'asc')->paginate(10,['*'], 'golongankerja');
  //   //$satuankerja = Satuankerja::find($id);
  //   $bidangbarang = Bidang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
  //                   ->select('bidang_barang.*','golongan_barang.name as golongan_barang_name')
  //                   ->find($id);
  //   return view('bidangbarangedit', ['golonganbarangs' => $golonganbarangs, 'bidangbarang' => $bidangbarang]);
  // }
  // public function update($id, Request $request){
  //   //dd($request);
  //   $bidangbarang = Bidang::find($id);
  //   $bidangbarang->code = $request->code;
  //   $bidangbarang->name = $request->name;
  //   $bidangbarang->status = $request->status;
  //   $bidangbarang->golongan_barang_id = $request->golonganbarang;
  //   $bidangbarang->save();
  //   return redirect('/barang/bidang');
  // }
  // public function add(){
  //   return view('bidangadd');
  // }
}
