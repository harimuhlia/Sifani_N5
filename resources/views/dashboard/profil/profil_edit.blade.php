@extends('tampilan.apputama')
@section('title', 'Edit Profil')
@section('subtitle', 'Halaman Edit Profil')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Formulir Untuk Edit Profil</h3>
                <div class="card-tools">
                  {{-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a> --}}
                </div>
              </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="{{ route('profil.update', Auth::user()->id) }}">
                @method("PUT")
                @csrf
                <div class="card-body">
                  <label for="nama">Nama Lengkap</label>
                  <input class="form-control" type="text" id="nama" value="{{ old('nama', Auth::user()->name) }}" name="name" class="@error('nama') is-invalid @enderror">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" id="email" value="{{ old('email', Auth::user()->email) }}" name="email" class="@error('email') is-invalid @enderror">
                  <label for="role">Role User</label>
                  <input class="form-control" type="text" id="role" value="{{ old('role', Auth::user()->role) }}" name="role" class="@error('role') is-invalid @enderror">
                  <label for="kelas">Kelas</label>
                  <input class="form-control" type="text" id="kelas" value="{{ old('kelas', Auth::user()->kelas) }}" name="kelas" class="@error('kelas') is-invalid @enderror">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" rows="5" id="alamat" name="alamat">{{ old('alamat', Auth::user()->alamat) }}</textarea>
                  <label for="password">Ganti Password</label>
                  <input class="form-control" type="password" id="kelas" name="password" class="@error('password') is-invalid @enderror">
                  <label for="foto_profil">Upload Foto Profil</label>
                  <input type="file" class="form-control" name="foto_profil">
            </div>
            <div class="modal-footer justify-content-between">
                <a href="{{ route('profil.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
              </form>
          </div>
          <!-- /.card -->
</section>
@include('sweetalert::alert')
@endsection