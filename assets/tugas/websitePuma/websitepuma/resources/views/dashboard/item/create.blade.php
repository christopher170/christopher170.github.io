@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{route('item.index')}}" class="btn btn-secondary">
        << kembali
    </a>

    </div>
    <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control form-control-sm" name="nama" id="nama" aria-describedby="helpId" 
          placeholder="Nama customer" value="{{Session::get('nama')}}">

        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">harga</label>
            <input type="text" class="form-control form-control-sm" name="harga" id="harga" aria-describedby="helpId" 
          placeholder="harga" value="{{Session::get('harga')}}">
        </div>
        <div class="mb-3">
            <label for="barang" class="form-label">barang </label>
            <input type="text" class="form-control form-control-sm" name="barang" id="barang" aria-describedby="helpId" 
          placeholder="nama barang " value="{{Session::get('barang')}}">
        <div class="mb-3">
            <label for="jumlah" class="form-label">jumlah </label>
            <input type="text" class="form-control form-control-sm" name="jumlah" id="jumlah" aria-describedby="helpId" 
          placeholder="jumlah barang " value="{{Session::get('jumlah')}}">
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