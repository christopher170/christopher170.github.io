<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use App\Models\metadata;
// use App\Http\Controllers\file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->_tipe = 'experience';
    }
    public function index()
    {
        $data = riwayat::where('tipe','experience')->orderBy('tgl_akhir','desc')->get() ;
        return view('dashboard.product.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session::flash('judul',$request->judul);
        session::flash('fotoproduct',$request->fotoproduct);
        session::flash('info1',$request->info1);
        session::flash('tgl_mulai',$request->tgl_mulai);
        session::flash('tgl_akhir',$request->tgl_akhir);
        session::flash('isi',$request->isi);
        $request->validate(
            [
                'judul'=> 'required',
                'fotoproduct' => 'required|mimes:jpeg,jpg,png,gif',
                'info1'=> 'required',
                'tgl_mulai'=> 'required',
                'isi'=> 'required',
            ],[
                'judul.Required'=> 'judul wajib diiisi',
                'fotoproduct.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                'fotoproduct.required'=> 'foto product wajib diisi',
                'info1.Required'=> 'nama perusahaan wajib diiisi',
                'tgl_mulai.Required'=> 'tanggal mulai wajib diiisi',
                'isi.Required'=> 'isian tulisan wajib diiisi' ,
            ]
        );
        

        $upload_image = $request->fotoproduct->store('fotoproduct');    

        
        $data = [
            'judul'=>$request->judul,
            'foto'=>$upload_image,
            'info1'=>$request->info1,
            'tipe'=> 'experience',
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir,
            'isi'=>$request->isi

        ]; 
        riwayat::create($data);
        return redirect()->route('product.index')->with('success','berhasil menambahkan data produk');
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
        $data = riwayat::where('id',$id)->where('tipe',$this->_tipe)->first();
        return view('dashboard.product.edit')->with('data',$data);
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
        $request->validate(
            [
                'fotoproduct' => 'required|mimes:jpeg,jpg,png,gif',
                'judul' => 'required',
                'info1' => 'required',
                // 'tgl_mulai' => 'required',
                'isi' => 'required',
            ],
            [
                'fotoproduct.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                'fotoproduct.required'=> 'foto product wajib diisi',
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama perusahaan wajib diisi',
                // 'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
                'isi.required' => 'Isian tulisan wajib diisi',
            ]
        );
    
        $data = [
            'fotoproduct'=>$request->foto,
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            // 'tgl_mulai' => $request->tgl_mulai,
            // 'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi
        ];
        // if ($request->hasFile(''))
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);

        return redirect()->route('product.index')->with('success', 'Berhasil melakukan update data product');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('product.index')->with('success', 'Berhasil melakukan delete data product');
    }
}
