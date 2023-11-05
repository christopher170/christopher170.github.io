<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\item;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = item::orderBy('id','asc')->get();
        return view('dashboard.item.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session::flash('nama',$request->nama);
        session::flash('harga',$request->nama);
        session::flash('barang',$request->nama);
        session::flash('jumlah',$request->nama);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        $request->validate(
            [
                'nama'=> 'required',
                'harga'=> 'required',
                'barang'=> 'required',
                'jumlah'=> 'required',
                'tgl_mulai'=> 'required',

                
            ],[
                'nama.Required'=> 'nama wajib diiisi',
                'harga.Required'=> 'harga wajib diiisi' ,
                'barang.Required'=> 'barang wajib diiisi' ,
                'jumlah.Required'=> 'jumlah wajib diiisi' ,
                'tgl_mulai.Required'=> 'tanggal mulai wajib diiisi' ,
            ]
        );
        $data = [
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'barang'=>$request->barang,
            'jumlah'=>$request->jumlah,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>$request->tgl_akhir,

        ]; 
        item::create($data);
        return redirect()->route('item.index')->with('success','berhasil menambahkan data');
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
        $data = item::where('id',$id)->first();
        return view('dashboard.item.edit')->with('data',$data);
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
                'nama'=> 'required',
                'isi'=> 'required',
            ],[
                'nama.Required'=> 'nama wajib diiisi',
                'isi.Required'=> 'isian tulisan wajib diiisi' ,
            ]
        );
        $data = [
            'nama'=>$request->nama,
            'isi'=>$request->isi,

        ]; 
        item::where('id',$id)->update($data);
        return redirect()->route('item.index')->with('success','berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        item::where('id',$id)->delete();
        return redirect()->route('item.index')->with('success','berhasil melakukan delete data');
    }
}

