<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\ObatMasuk;
use Illuminate\Http\Request;
use App\Models\ObatMasukTemp;
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
        // $temp = ObatMasuk::all();
        // dd($temp);
        return view('obat-masuk.index',[
            'title'=>'Obat Masuk',
            'obatmasuks'=>ObatMasuk::all(),
            'data_obats'=>DataObat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat-masuk.create',[
            'title'=>'Tambah Riwayat Obat Masuk',
            'data_obats'=>DataObat::all(),
            'obat_masuks'=>ObatMasukTemp::all()
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
            'dataobat_id'=>'required',
            'jumlah'=>'required',
            'harga'=>'required',
            'nama_apotek'=>'required|max:255',
            'expired'=>'required'
        ]);
        $kode_transaksi = IdGenerator::generate(['table' => 'obat_masuk','field'=>'kode_transaksi' ,'length' => 8, 'prefix' =>'M']);

        switch($request->input('action')){
            case 'add':
                // dd($validatedData);
                DB::table('obat_masuk_temps')->insert(['kode_transaksi'=>$kode_transaksi,'tgl_masuk'=>$validatedData['tgl_masuk'],'dataobat_id'=>$validatedData['dataobat_id'],'jumlah'=>$validatedData['jumlah'],'harga'=>$validatedData['harga'],'nama_apotek'=>$validatedData['nama_apotek'],'expired'=>$validatedData['expired']]);
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
            'data_obats'=>DataObat::all(),
            'title'=>'Edit Data',
            'obatmasuk'=> ObatMasuk::where('id',$id)->first()
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
            'dataobat_id'=>'required',
            'jumlah'=>'required',
            'harga'=>'required',
            'nama_apotek'=>'required|max:255',
            'expired'=>'required'
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
        $data_id = $data->dataobat_id;
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
        return response()->json([
           'kode_obat' => $columns->kode_obat,
           'satuan' => $columns->satuan
        ]);

    }

    public function getDataTemp(Request $request){
        $temps = ObatMasukTemp::all()->toArray();
        // $barang = ObatMasukTemp::all();
        
        
        foreach($temps as $temp){
            // dump($temp['dataobat_id']);
            $dataobat = DataObat::find($temp['dataobat_id']);
            $dataobat->jumlah += $temp['jumlah'];
            // dump($dataobat);
            $dataobat->save();
            // dump($dataobat->jumlah);
            DB::table('obat_masuk')->insert($temp);
            DB::table('obat_masuk_temps')->delete($temp);
        }
        // ObatMasukTemp::destroy($temp['kode_transaksi']);
        // $sum = DataObat::all();
        // dd($sum);
        Alert::success('Sukses', 'Data Berhasil Disimpan!');
        return redirect('/obat-masuk');

    }

   
}
