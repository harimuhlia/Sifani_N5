@extends('tampilan.apputama')
@section('title', 'Edit Informasi')
@section('subtitle', 'Halaman Edit Informasi')
    
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Formulir Untuk Mengedit Informasi</h3>
                <div class="card-tools">
                  {{-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a> --}}
                </div>
              </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="{{ route('informasi.update', $informasi->slug )}}">
                @method("PUT")
                @csrf
                <div class="card-body">
                  <label for="JudulInformasi">Judul Informasi</label>
                  <input class="form-control" type="text" id="judulinformasi" value="{{ old('judul', $informasi->judulinformasi) }}" name="judulinformasi" class="@error('judulinformasi') is-invalid @enderror">
                  <label for="persyaratan">Deskripsi</label>
                  <textarea class="textarea" rows="3" name="deskripsi">{{ old('judul', $informasi->deskripsi) }}</textarea>
                  <label for="fileupload">Upload File</label>
                  <input type="file" class="form-control" name="fileupload">
            </div>
            <div class="modal-footer justify-content-between">
              <a href="{{ route('informasi.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
              <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
              </form>
          </div>
          <!-- /.card -->
</section>
@endsection