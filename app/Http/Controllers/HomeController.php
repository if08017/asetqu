<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Barang;
use App\Models\Inventori;
use App\Models\Mutation;
use App\Models\Baranghabispakai;

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
      $barangs = Barang::sum('quantity');
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
      // $inputs = Charts::database(Inventori::all(),'line', 'highcharts')
      //         ->dateFormat('j F y')
      //         ->title('Aktifitas input inventori harian')
      //         ->elementLabel('Total')
      //         ->dimensions(0,300)
      //         ->responsive(false)
      //         // ->groupByDay()
      //         ->lastByDay(14, true);
      $charts = Charts::multiDatabase('areaspline','highcharts')
              ->dataset('Input Inventori',Inventori::all())
              ->dataset('BHP Masuk',Baranghabispakai::where('mutation_id','1')->get())
              ->dataset('BHP Keluar',Baranghabispakai::where('mutation_id','2')->get())
              // ->dataset('Mutasi',Mutation::where('status_name','Mutasi Pindah')->get())
              // ->dataset('Usulan penghapusan',Mutation::where('status_name','Dalam usulan penghapusan')->get())
              ->dateFormat('j F y')
              ->title('Aktifitas inventori harian')
              //->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
              //->values([100,50,25])
              ->elementLabel('Jumlah')
              ->dimensions(0,300)
              ->responsive(false)
              //->groupByDay();
              ->lastByDay(14, true);
      $years = Charts::database(Inventori::all(),'bar', 'highcharts')
              ->dateFormat('j F y')
              ->title('Grafik Tahunan')
              ->elementLabel('Total')
              ->dimensions(0,200)
              ->responsive(false)
              ->groupByYear();
      $charts2 = Charts::database(Inventori::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
              ->select('inventori_barang.*','golongan_barang.name as golongan_barang_name')
              ->get(),'area', 'highcharts')
              ->title('Line Kategori')
              ->elementLabel('Total')
              ->dimensions(0,200)
              ->responsive(false)
              ->groupBy('golongan_barang_name');
      return view('home', ['barangs' => $barangs,'charts'=>$charts, 'charts2'=>$charts2, 'years'=>$years]);
    }
    public function search(Request $request){
      //$search = \Request::get('search');
      // dd($request);
      $barangs = Mutation::join('barang','barang_id','=','barang.id')
                ->join('pegawai','mutation.pegawai_id','=','pegawai.id')
                ->join('ruangan','mutation.ruangan_id','=','ruangan.id')
                ->select('mutation.*', 'pegawai.name as pegawai_name', 'ruangan.name as ruangan_name')
                ->where(function($query) use ($request){
                  $query->orWhere('mutation.barang_code','like','%'.$request->term.'%');
                  $query->orWhere('mutation.barang_name','like','%'.$request->term.'%');
                  $query->orWhere('mutation.description','like','%'.$request->term.'%');
                  $query->orWhere('mutation.quantity','like','%'.$request->term.'%');
                  $query->orWhere('mutation.kondisi_name','like','%'.$request->term.'%');
                  $query->orWhere('mutation.status_name','like','%'.$request->term.'%');
                  $query->orWhere('pegawai.name','like','%'.$request->term.'%');
                  $query->orWhere('ruangan.name','like','%'.$request->term.'%');
                })
                ->orderBy('id', 'asc')->paginate(5);
      // dd($barangs);
      return view('search',['barangs'=>$barangs, 'request'=>$request]);
    }
    public function autocomplete(Request $request){
      //call by non ajax autocomplete
      // dd($request);
      if ($request->ajax()) {
        // dd($request);
        $barangs = Mutation::join('barang','barang_id','=','barang.id')
                  ->join('pegawai','mutation.pegawai_id','=','pegawai.id')
                  ->join('ruangan','mutation.ruangan_id','=','ruangan.id')
                  ->select('mutation.*')
                  ->select('mutation.*', 'pegawai.name as pegawai_name', 'ruangan.name as ruangan_name')
                  ->where(function($query) use ($request){
                    $query->orWhere('mutation.barang_code','like','%'.$request->term.'%');
                    $query->orWhere('mutation.barang_name','like','%'.$request->term.'%');
                    $query->orWhere('mutation.description','like','%'.$request->term.'%');
                    $query->orWhere('mutation.quantity','like','%'.$request->term.'%');
                    $query->orWhere('mutation.kondisi_name','like','%'.$request->term.'%');
                    $query->orWhere('mutation.status_name','like','%'.$request->term.'%');
                    $query->orWhere('ruangan.name','like','%'.$request->term.'%');
                    $query->orWhere('pegawai.name','like','%'.$request->term.'%');
                  })
                ->orderBy('id', 'asc')
                ->take(5)
                ->get();
        //convert to Json
        // dd($barangs);
        $results = [];
        foreach ($barangs as $barang) {
          $results[] = ['id' => $barang->barang_id, 'value' => $barang->barang_name, 'label' => $barang->barang_code.'-'.$barang->barang_name];
        }
        //dd($results);
        return \Response::json($results);
        //return response()->json($results);
      }
    }
}
