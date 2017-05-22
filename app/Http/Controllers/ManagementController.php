<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Ruangan;
use App\Models\Jabatan;

class ManagementController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index(){
    $jabatans = Jabatan::orderBy('name', 'asc')->paginate(10,['*'], 'jabatan');
    $ruangans = Ruangan::orderBy('name', 'asc')->paginate(10,['*'], 'ruangan');
    return view('management', ['jabatans' => $jabatans, 'ruangans' => $ruangans]);
    //return view('management');
  }
  public function jabatan_insert(Request $request){
    Jabatan::create([
      'name' => $request->name
    ]);
    return redirect('/management');
  }
  public function jabatan_delete($id){
    Jabatan::destroy($id);
    return redirect('/management');
  }
  public function jabatan_edit($id){
    $jabatan = Jabatan::find($id);
    return view('jabatanedit', ['jabatan' => $jabatan]);
  }
  public function jabatan_update($id, Request $request){
    $jabatan = Jabatan::find($id);
    $jabatan->name = $request->name;
    $jabatan->save();
    return redirect('/management');
  }
  public function ruangan_insert(Request $request){
    //dd($request);
    Ruangan::create([
      'name' => $request->name
    ]);
    return redirect('/management');
  }
  public function ruangan_delete($id){
    Ruangan::destroy($id);
    return redirect('/management');
  }
  public function ruangan_edit($id){
    $ruangan = Ruangan::find($id);
    return view('ruanganedit', ['ruangan' => $ruangan]);
  }
  public function ruangan_update($id, Request $request){
    $ruangan = Ruangan::find($id);
    $ruangan->name = $request->name;
    $ruangan->save();
    return redirect('/management');
  }
}
