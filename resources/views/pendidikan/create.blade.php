@extends('layout.template')

@section('konten')
<form action='{{ url('identitas') }}' method='post' enctype="multipart/form-data">
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url("identitas") }}' class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" class="form-control @error('id') is-invalid @enderror" name='id' value="{{ old('id', Session::get('id')) }}" id="id">
                @error('id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Instansi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_instansi' value="{{ Session::get('nama_instansi') }}" id="nama_instansi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Nama Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_jurusan' value="{{ Session::get('nama_jurusan') }}" id="nama_jurusan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tahun Masuk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tahun_masuk' value="{{ Session::get('tahun_masuk') }}" id="tahun_masuk">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tahun keluar</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tahun_keluar' value="{{ Session::get('tahun_keluar') }}" id="tahun_keluar">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
