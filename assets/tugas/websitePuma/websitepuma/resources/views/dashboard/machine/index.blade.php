@extends('dashboard.layout')

@section('konten')
    <p class="card-title">machine</p>
    <div class="pb-3"><a href="{{ route('machine.create') }}" class="btn btn-primary">+ Tambah machine</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Nama Mesin</th>
                    <th>Foto</th>
                    <th>Nama Perusahaan</th>
                    <th>Maximum workpiece dimensions </th>
                    <th>Maximum workpiece weight</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Akhir</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>@if($item -> foto)<img src = "{{asset('storage/' .  $item->foto)}}" height="45">@endif</td>                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->info2 }}</td>
                        <td>{{ $item->info3 }}</td>
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        <td>
                            <a href='{{ route('machine.edit', $item->id) }}' class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                action="{{ route('machine.destroy', $item->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name='submit'>Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection