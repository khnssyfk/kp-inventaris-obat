<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataObat;
use App\Models\ObatMasuk;
use Illuminate\Http\Request;
use App\Models\ObatMasukTemp;
use App\Models\SupplierObat;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ObatMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->DataObat = new DataObat();
    // }
    public function index()
    {
        // $temp = ObatMasuk::orderBy('id','desc')->get();
        // dump($temp);
        return view('obat-masuk.index',[
            'title'=>'Obat Masuk',
            'obatmasuks'=>ObatMasuk::orderBy('id','desc')->get(),
            'data_obats'=>DataObat::all(),
            'suppliers'=>SupplierObat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $temp = DataObat::orderBy('nama_obat')->get();
        // dump($temp);
        return view('obat-masuk.create',[
            'title'=>'Tambah Riwayat Obat Masuk',
            'data_obats'=>DataObat::orderBy('nama_obat')->get(),
            'obat_masuks'=>ObatMasukTemp::all(),
            'suppliers'=>SupplierObat::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_masuk'=>'required',
            'data_obat_id'=>'required',
            'jumlah'=>'required',
            'total'=>'required',
            'harga'=>'required',
            'expired'=>'required',
            'supplier_obat_id'=>'required'
        ]);
        // dd($request->total);
        // $tgl = Carbon::createFromFormat('m/d/Y', $request->tgl_masuk)->format('Y-m-d');
        // $tgl = explode("-", $request->tgl_masuk);
        // $tahun = substr($tgl[0], -2);
        // $tanggal = "M".$tgl[2].$tgl[1].$tahun;

        $kode_transaksi = IdGenerator::generate(['table' => 'obat_masuk','field'=>'kode_transaksi' ,'length' => 10, 'reset_on_prefix_change' => true,'prefix' =>'M'.date('ym')]);
        // dd($kode_transaksi);
        switch($request->input('action')){
            case 'add':
                ObatMasukTemp::create(['kode_transaksi'=>$kode_transaksi,'tgl_masuk'=>$validatedData['tgl_masuk'],'data_obat_id'=>$validatedData['data_obat_id'],'jumlah'=>$validatedData['jumlah'],'harga'=>$validatedData['harga'],'total'=>$validatedData['total'],'supplier_obat_id'=>$validatedData['supplier_obat_id'],'expired'=>$validatedData['expired']]);

                // DB::table('obat_masuk_temps')->insert(['kode_transaksi'=>$kode_transaksi,'tgl_masuk'=>$validatedData['tgl_masuk'],'data_obat_id'=>$validatedData['data_obat_id'],'jumlah'=>$validatedData['jumlah'],'harga'=>$validatedData['harga'],'total'=>$validatedData['total'],'supplier_obat_id'=>$validatedData['supplier_obat_id'],'expired'=>$validatedData['expired']]);
                Alert::success('Sukses', 'Data Berhasil Ditambah!');
                return redirect('/obat-masuk/create');
            case 'submit':
                dd('add');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(ObatMasuk $obatMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('obat-masuk.edit',[
             
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tgl_masuk'=>'required',
            'data_obat_id'=>'required',
            'jumlah'=>'required',
            'harga'=>'required',
            'nama_apotek'=>'required|max:255',
            'expired'=>'required',
            'supplier_obat_id'=>'required'
        ]);
        ObatMasuk::where('id',$id)->update($validatedData);
        Alert::success('Sukses', 'Data Obat Berhasil Diganti!');
        return redirect('/obat-masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatMasuk  $obatMasuk
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data = ObatMasuk::where('id',$id)->first();
        $data_id = $data->data_obat_id;
        // dd($data->jumlah);
        
        $dataobat = DataObat::find($data_id);
        $dataobat->jumlah -= $data->jumlah;
        // dd($dataobat);
        $dataobat->save();
        ObatMasuk::destroy($id);
        Alert::success('Sukses', 'Data Berhasil Dihapus!');
        return redirect('/obat-masuk');
    }

    public function getDataMasuk($id=""){
        $columns = DB::table('data_obats')->where('kode_obat', $id)->first();
        $satuanObat = DB::table('kemasan_obats')->where('kode_kemasan', $columns->kemasan_obat_id)->first()->bentuk_obat_id;
        $data = DB::table('bentuk_obats')->where('kode_bentuk', $satuanObat)->first()->bentuk_obat;
        $kemasanObat = DB::table('kemasan_obats')->where('kode_kemasan', $columns->kemasan_obat_id)->first()->keterangan;
        $isikemasanObat = DB::table('kemasan_obats')->where('kode_kemasan', $columns->kemasan_obat_id)->first()->jumlah;
        return response()->json([
           'kode_obat' => $columns->kode_obat,
           'satuan' => $data,
           'kemasan'=>$kemasanObat,
           'isikemasan'=>$isikemasanObat,
           'jumlah'=>$columns->jumlah
        ]);
        
        // dd($kemasanObat);

    }

    public function getDataTemp(Request $request){
        $temps = ObatMasukTemp::all()->toArray();
        // $barang = ObatMasukTemp::all();
        
        
        foreach($temps as $temp){
            // dump($temp['data_obat_id']);
            $dataobat = DataObat::find($temp['data_obat_id']);
            $dataobat->jumlah += $temp['total'];
            // dump($dataobat);
            $dataobat->save();
            // dump($dataobat->jumlah);
            ObatMasuk::create($temp);
            ObatMasukTemp::destroy($temp);
            // DB::table('obat_masuk')->insert($temp);
            // DB::table('obat_masuk_temps')->delete($temp);
        }
    
        Alert::success('Sukses', 'Data Berhasil Disimpan!');
        return redirect('/obat-masuk');

    }

   
}
