@extends('dashboard.layout')

@section('konten')
      <p class="card-title">item</p>
    <div class="pb-3"><a href="{{route('item.create')}}" class="btn btn-primary">+ Tambah item</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">no</th>
                    <th>nama</th>
                    <th>harga</th>
                    <th>barang</th>
                    <th>jumlah</th>
                    <th>tanggal mulai</th>
                    <th>tanggal akhir</th>
                    <th class="col-3">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->harga}}</td>
                        <td>{{$item->barang}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>{{$item->tgl_mulai_indo}}</td>
                        <td>{{$item->tgl_akhir_indo}}</td>
                        <td>
                            <a href="{{route('item.edit',$item->id)}}" class="btn btn-sm btn-warning">edit</a>
                            <form onsubmit = "return confirm ('yakin mau hapus data ini ?')"action="{{route('item.destroy',$item->id)}}" 
                                class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection