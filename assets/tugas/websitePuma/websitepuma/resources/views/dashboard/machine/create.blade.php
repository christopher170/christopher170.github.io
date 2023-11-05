@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{route('machine.index')}}" class="btn btn-secondary">
        << kembali </a>

    </div>
    <form action="{{route('machine.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Nama Mesin</label>
          <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" 
          placeholder="Nama Mesin" value="{{Session::get('judul')}}">

        </div>
        <div class="mb-3">
          <label for="fotomesin" class="form-label">Foto</label>
          <input type="file" class="form-control form-control-sm" name="fotomesin" id="fotomesin" aria-describedby="helpId" 
          placeholder="Foto" value="{{Session::get('foto')}}">
      </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" 
          placeholder="Nama Perusahaan" value="{{Session::get('info1')}}">
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Maximum workpiece dimensions </label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info2" aria-describedby="helpId" 
          placeholder="Maximum workpiece dimensions " value="{{Session::get('info2')}}">
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">Maximum workpiece weight</label>
            <input type="text" class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId" 
          placeholder="Maximum workpiece weight" value="{{Session::get('info3')}}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai" placeholder="dd/mm//yyyy"value="{{Session::get('tgl_mulai')}}"></div>
                <div class="col-auto">Tanggal Akhir</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir" placeholder="dd/mm//yyyy"value="{{Session::get('tgl_akhir')}}"></div>
            </div>
        </div>
        
        <button class="btn btn-primary" name="Simpan" type="submit">Simpan</button>
    </form>
@endsection