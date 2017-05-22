<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Barang;

use Charts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $barangs = Barang::count();
      //dd($barangs);
      // $chart = Charts::multi('bar', 'material')
			// // Setup the chart settings
			// ->title("My Cool Chart")
			// // A dimension of 0 means it will take 100% of the space
			// ->dimensions(400, 200) // Width x Height
			// // This defines a preset of colors already done:)
			// ->template("material")
			// // You could always set them manually
			// // ->colors(['#2196F3', '#F44336', '#FFC107'])
			// // Setup the diferent datasets (this is a multi chart)
			// ->dataset('Element 1', [5,20,100])
			// ->dataset('Element 2', [15,30,80])
			// ->dataset('Element 3', [25,10,40])
			// // Setup what the values mean
			// ->labels(['One', 'Two', 'Three']);
      $charts = Charts::database(Barang::all(),'line', 'highcharts')
              ->dateFormat('j F y')
              ->title('Aktifitas input barang Harian')
              //->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
              //->values([100,50,25])
              ->elementLabel('Grafik harian')
              ->dimensions(0,300)
              ->responsive(false)
              //->groupByDay();
              ->lastByDay(14, true);
      $years = Charts::database(Barang::all(),'bar', 'highcharts')
              ->dateFormat('j F y')
              ->title('Aktifitas Tahunan')
                ->elementLabel('Grafik tahunan')
              ->dimensions(0,200)
              ->responsive(false)
              ->groupByYear();
      $charts2 = Charts::database(Barang::all(),'pie', 'highcharts')
              ->title('Pie Chart Kategori')
              ->elementLabel('Total')
              ->dimensions(0,200)
              ->responsive(false)
              ->groupBy('golongan_barang_id');
      return view('home', ['barangs' => $barangs, 'charts' => $charts, 'charts2' => $charts2, 'years' => $years]);
    }
    public function search(Request $request){
      //$search = \Request::get('search');
      // dd($request);
      $barangs = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
                  ->join('ruangan','ruangan_id','=','ruangan.id')
                  ->join('pegawai','pegawai_id','=','pegawai.id')
                  ->select('barang.*','golongan_barang.name as golongan_barang_name','ruangan.name as ruangan_name','pegawai.name as pegawai_name')
                  ->where(function($query) use ($request){
                  $query->orWhere('barang.code','like','%'.$request->term.'%');
                  $query->orWhere('barang.name','like','%'.$request->term.'%');
                  $query->orWhere('barang.number','like','%'.$request->term.'%');
                  $query->orWhere('barang.description','like','%'.$request->term.'%');
                  $query->orWhere('barang.quantity','like','%'.$request->term.'%');
                  $query->orWhere('pegawai.nip','like','%'.$request->term.'%');
                  $query->orWhere('pegawai.name','like','%'.$request->term.'%');
                  $query->orWhere('pegawai.contact','like','%'.$request->term.'%');
                  $query->orWhere('barang.kondisi_name','like','%'.$request->term.'%');
                  $query->orWhere('barang.status_name','like','%'.$request->term.'%');
                  $query->orWhere('ruangan.name','like','%'.$request->term.'%');
                  $query->orWhere('golongan_barang.name','like','%'.$request->term.'%');
                })
                ->orderBy('id', 'asc')->paginate(5);
      // dd($request);
      return view('search',['barangs'=>$barangs, 'request'=>$request]);
    }
    public function autocomplete(Request $request){
      //call by non ajax autocomplete
      if ($request->ajax()) {
        //dd($request);
        $barangs = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
                    ->join('ruangan','ruangan_id','=','ruangan.id')
                    ->join('pegawai','pegawai_id','=','pegawai.id')
                    ->select('barang.*','golongan_barang.name as golongan_barang_name','ruangan.name as ruangan_name','pegawai.name as pegawai_name')
                    ->where(function($query) use ($request){
                      $query->orWhere('barang.code','like','%'.$request->term.'%');
                      $query->orWhere('barang.name','like','%'.$request->term.'%');
                      $query->orWhere('barang.number','like','%'.$request->term.'%');
                      $query->orWhere('barang.description','like','%'.$request->term.'%');
                      $query->orWhere('barang.quantity','like','%'.$request->term.'%');
                      $query->orWhere('pegawai.nip','like','%'.$request->term.'%');
                      $query->orWhere('pegawai.name','like','%'.$request->term.'%');
                      $query->orWhere('pegawai.contact','like','%'.$request->term.'%');
                      $query->orWhere('barang.kondisi_name','like','%'.$request->term.'%');
                      $query->orWhere('barang.status_name','like','%'.$request->term.'%');
                      $query->orWhere('ruangan.name','like','%'.$request->term.'%');
                      $query->orWhere('golongan_barang.name','like','%'.$request->term.'%');
                  })
                  ->orderBy('name', 'asc')
                  ->take(5)
                  ->get();
        //convert to Json
        $results = [];
        foreach ($barangs as $barang) {
          $results[] = ['id' => $barang->code, 'value' => $barang->name];
        }
        //dd($results);
        return \Response::json($results);
        //return response()->json($results);
      }
    }
}
