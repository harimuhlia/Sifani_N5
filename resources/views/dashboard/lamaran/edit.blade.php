@extends('tampilan.apputama')
@section('title', 'Edit Lamaran')
@section('subtitle', 'Halaman Edit Data Lamaran')
    
@section('content')
<div class="container-fluid p-0">
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    
                    <h6 class="h3 mb-3">Formulir Pendaftaran {{ $lowongan->perusahaan }}</h6>
                    <form action="{{ route('update-lamaran') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                        <input type="hidden" name="kode_pendaftaran" id="kode_pendaftaran">

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pendaftar->nama )}}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan Sekolah</label>
                                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value="{{ old('jurusan', $pendaftar->jurusan )}}">
                                    @error('jurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $pendaftar->asal_sekolah )}}">
                                    @error('asal_sekolah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="{{ old('jenis_kelamin', $pendaftar->jenis_kelamin )}}">{{ $pendaftar->jenis_kelamin }}</option>
                                        <option value="Laki-Laki" {{ $pendaftar->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ $pendaftar->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Simpan Edited</button>
                                <a href="/dashboard/lamaran" type="button" class="btn btn-secondary float-left"><i class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                        </div>

                    </form>              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>
@endsection