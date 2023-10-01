@extends('layout.template')
@section('konten')

<div class="container my-3 p-3 bg-body rounded shadow-sm">
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('identitas') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('identitas/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>
    
    <!-- TABEL DATA -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Kewarganegaraan</th>
                    <th>Status</th>
                    <th>Pas Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->kewarganegaraan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <img src="{{ asset('pas_foto/' . $item->pas_foto) }}" alt="Foto" style="max-width: 50px; max-height: 50px;">
                    </td>
                    <td>
                        <a href='{{ url('identitas/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('identitas/'.$item->id) }}" method="post">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
