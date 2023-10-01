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
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='tempat_lahir' value="{{ Session::get('tempat_lahir') }}" id="tempat_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tanggal_lahir' value="{{ Session::get('tanggal_lahir') }}" id="tanggal_lahir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jenis_kelamin' value="{{ Session::get('jenis_kelamin') }}" id="jenis_kelamin">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='agama' value="{{ Session::get('agama') }}" id="agama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kewarganegaraan' value="{{ Session::get('kewarganegaraan') }}" id="kewarganegaraan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='status' value="{{ Session::get('status') }}" id="status">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pas_foto" class="col-sm-2 col-form-label">Pas Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='pas_foto' id="pas_foto">
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
