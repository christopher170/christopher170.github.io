<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class machineController extends Controller
{
    function __construct()
    {
        $this->_tipe = 'education';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.machine.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.machine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('fotomesin', $request->fotomesin);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        // Session::flash('tgl_mulai', $request->tgl_mulai);
        // Session::flash('tgl_akhir', $request->tgl_akhir);

        $request->validate(
            [
                'judul' => 'required',
                'fotomesin' => 'required|mimes:jpeg,jpg,png,gif',
                'info1' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'fotomesin.required' => 'foto wajib diisi',
                'fotomesin.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                'info1.required' => 'Nama perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
            ]
        );
        $upload_image = $request->fotomesin->store('fotomesin');
        
       
        $data = [
            'judul' => $request->judul,
            'foto' => $upload_image,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];
        riwayat::create($data);

        return redirect()->route('machine.index')->with('success', 'Berhasil menambahkan data machine');
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
        $data = riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.machine.edit')->with('data', $data);
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
                'fotomesin' => 'mimes:jpeg,jpg,png,gif',
                'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'fotomesin.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berkestensi JPEG, JPG, PNG, dan GIF',
                'judul.required' => 'Judul wajib diisi',
                'info1.required' => 'Nama perusahaan wajib diisi',
                'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];
        if ($request->hasFile('fotomesin')){
            if (Storage :: delete($data->foto)){
                $foto = $request->fotomesin->store('fotomesin');
                $data->foto = $foto;
            }else{
                
            }
        }
        
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);

        return redirect()->route('machine.index')->with('success', 'Berhasil melakukan update data machine');
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
        return redirect()->route('machine.index')->with('success', 'Berhasil melakukan delete data machine');
    }
}