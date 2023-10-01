@extends('layout.template')
@section('konten')

<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('portofolio') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>

    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('portofolio/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <!-- TABEL DATA -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-2">Nama Proyek</th>
                    <th class="col-md-2">Deskripsi</th>
                    <th class="col-md-2">Foto Proyek</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_proyek }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <img src="{{ asset('foto_proyek/' . $item->foto_proyek) }}" alt="Foto_proyek" style="max-width: 50px; max-height: 50px;">
                    </td>
                    <td>
                        <a href='{{ url('portofolio/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('portofolio/'.$item->id) }}" method="post">
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
<!-- Akhir Data -->
@endsection
