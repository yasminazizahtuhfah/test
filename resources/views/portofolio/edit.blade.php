@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('portofolio/'.$data->id) }}' method='post' enctype="multipart/form-data">
@csrf 
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('portofolio') }}' class="btn btn-secondary"><< kembali</a>
    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
            {{ $data->id }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Proyek</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama_proyek' value="{{ Session::get('nama_proyek') }}" id="nama_proyek">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="deskripsi" value="{{ Session::get('deskripsi') }}" id="deskripsi"></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="foto_proyek" class="col-sm-2 col-form-label">Foto Proyek</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name='foto_proyek' id="foto_proyek">
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
