<?php

namespace App\Http\Controllers;

use App\Models\SupplierObat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class SupplierObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplier-obat.index',[
            'title'=>'Supplier Obat',
            'supplier_obats'=>SupplierObat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier-obat.create',[
            'title'=>'Tambah Supplier Obat',
            'supplier_obats'=>SupplierObat::all()
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
            'nama_supplier' => 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required'
        ]);

        // dd($request);        
        if (count($validatedData['alamat'])>0){
            foreach($validatedData['alamat'] as $item=>$value){
                $data = array(
                    'kode_supplier'=>IdGenerator::generate(['table' => 'supplier_obats','field'=>'kode_supplier' ,'length' => 5, 'prefix' =>'TK']),
                    'nama_supplier'=>$validatedData['nama_supplier'][$item],
                    'alamat'=>$validatedData['alamat'][$item],
                    'no_hp'=>$validatedData['no_hp'][$item],
                );
                SupplierObat::create($data);
                
                // dump($data);
            }
        }

        Alert::success('Sukses', 'Supplier Obat Berhasil Ditambah!');
        return redirect('/supplier-obat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('supplier-obat.edit',[
            'title'=>'Edit Supplier Obat',
            'supplier_obat'=> supplierObat::where('kode_supplier',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_supplier' => 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required'
        ]);
        supplierObat::where('kode_supplier',$id)->update($validatedData);
        Alert::success('Sukses', 'Supplier Obat Berhasil Diganti!');
        return redirect('/supplier-obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_supplier)
    {
        supplierObat::where('kode_supplier',$kode_supplier)->delete();
        Alert::success('Sukses', 'Supplier Berhasil Dihapus!');
        return redirect('/supplier-obat');
    }
}
