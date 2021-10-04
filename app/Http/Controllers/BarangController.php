<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Picqer\Barcode;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorJPG;
use App\Models\Barang;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = Barang::all();
        return view('barang.barang', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.barang_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $date = date('YY/MM/DD');
        // $kode = explode('/', $date);
        $date = Carbon::now()->format('Ymd');
        $number = rand(0, 99);
        $number_exist=true;
        while($number_exist){
            // $kode_barcode=$date.uniqid($number);
            $kode_barcode=$date.$number;
            if (!Barang::where('barcode_kode', '=',"'".$kode_barcode."'")->exists()) {
            //    $liscence->num_liscence=$num_liscence;
            // $generatorPNG = new BarcodeGeneratorPNG();
            // // $barcode = $generator->getBarcode($kode_barcode, $generator::TYPE_CODE_128);
            // $barcode = '< img src="data:image/png;base64,'.base64_encode($generatorPNG->getBarcode('$kode_barcode', $generatorPNG::TYPE_CODE_128)).'" >';
            // // $barcode = $generatorPNG->getBarcode($kode_barcode, $generatorPNG::TYPE_CODE_128);
            $barangs = Barang::create([
                'nama_barang'       => $request->nama,
                'barcode_kode'      => $kode_barcode
            ]);
            $number_exist=false;
            }
         }
        $this->validate($request, [
            'nama'   => 'required',
        ]);

        // $image = $request->image;  // your base64 encoded
        // $image = str_replace('data:image/png;base64,', '', $barcode);
        // $image = str_replace(' ', ' + ', $image);
        // $imageName = $request->nama.time() . '.png';

        // Storage::disk('local')->put($imageName, base64_decode($image));

        

        
        if($barangs){
            //redirect dengan pesan sukses
            return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('barang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
