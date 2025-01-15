@extends('tampilan.apputama')
@section('title', 'Daftar Lamaran Lowongan')
@section('subtitle', 'Halaman Formulir Pendaftaran Lowongan')

@section('content')
<div class="container-fluid p-0">
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                @if($lowongan->pendaftars->contains('user_id', Auth::id()))
                        <a href="/dashboard/lowongan-tersedia/" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Anda sudah mendaftar, Silakan Cek Disini!</a>
                @else
                    <h6 class="h3 mb-3">Formulir Pendaftaran {{ $lowongan->perusahaan }}</h6>
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                        <input type="hidden" name="kode_pendaftaran" id="kode_pendaftaran">

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_ak1" class="form-label">Nomor AK 1</label>
                                    <input type="text" class="form-control @error('no_ak1') is-invalid @enderror" id="no_ak1" name="no_ak1">
                                    @error('no_ak1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan Sekolah</label>
                                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan">
                                    @error('jurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" name="asal_sekolah">
                                    @error('asal_sekolah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" id="" name="jenis_kelamin" class="@error('jenis_kelamin') is-invalid @enderror">
                                        <option>==Pilih==</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                      </select>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Daftar</button>
                                <a href="/dashboard/lowongan-tersedia/" type="button" class="btn btn-secondary float-left"><i class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                        </div>

                    </form> 
                @endif             
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
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