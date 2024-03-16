@extends('tampilan.apputama')
@section('title', 'Membuat Edit Data Lowongan')
@section('subtitle', 'Halaman Mengedit Lowongan')
    
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Formulir Untuk Edit Lowongan</h3>
                <div class="card-tools">
                  {{-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a> --}}
                </div>
              </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="{{ route('lowongan.update', $lowongan->slug )}}">
                @method("PUT")
                @csrf
                <div class="card-body">
                  <label for="JudulLowongan">Judul Lowongan</label>
                  <input class="form-control" type="text" id="judul" value="{{ old('judul', $lowongan->judul) }}" name="judul" class="@error('judul') is-invalid @enderror">
                  <label for="perusahaan">Nama Perusahaan</label>
                  <input class="form-control" type="text" id="perusahaan" value="{{ old('perusahaan', $lowongan->perusahaan) }}" name="perusahaan" class="@error('perusahaan') is-invalid @enderror">
                  <label for="posisi">Posisi</label>
                  <input class="form-control" type="text" id="posisi" value="{{ old('posisi', $lowongan->posisi) }}" name="posisi" class="@error('posisi') is-invalid @enderror">
                  <label for="batas_waktu">Batas Waktu</label>
                  <input class="form-control" type="datetime-local" id="batas_waktu" value="{{ old('batas_waktu', $lowongan->batas_waktu) }}" name="batas_waktu" class="@error('batas_waktu') is-invalid @enderror">
                  <label for="persyaratan">Persyaratan</label>
                  <textarea class="textarea" rows="10" id="editor" name="persyaratan">{{ old('persyaratan', $lowongan->persyaratan) }}</textarea>
                  <label for="gambar">Upload Gambar</label>
                  <input type="file" class="form-control" name="gambar">
            </div>
            <div class="modal-footer justify-content-between">
                <a href="{{ route('lowongan.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
              </form>
          </div>
          <!-- /.card -->
</section>
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