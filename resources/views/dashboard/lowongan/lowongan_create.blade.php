@extends('tampilan.apputama')
@section('title', 'Membuat Data Lowongan')
@section('subtitle', 'Halaman Membuat Lowongan Baru')
    
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Formulir Untuk Menambah Lowongan Baru</h3>
                <div class="card-tools">
                  {{-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a> --}}
                </div>
              </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\DashboardLowonganController@store')}}">
                @csrf
                <div class="card-body">
                  <label for="JudulLowongan">Judul Lowongan</label>
                  <input class="form-control" type="text" id="judul" name="judul" class="@error('judul') is-invalid @enderror">
                  <label for="perusahaan">Nama Perusahaan</label>
                  <input class="form-control" type="text" id="perusahaan" name="perusahaan" class="@error('perusahaan') is-invalid @enderror">
                  <label for="posisi">Posisi</label>
                  <input class="form-control" type="text" id="posisi" name="posisi" class="@error('posisi') is-invalid @enderror">
                  <label for="batas_waktu">Batas Waktu</label>
                  <input class="form-control" type="datetime-local" id="batas_waktu" name="batas_waktu" class="@error('batas_waktu') is-invalid @enderror">
                  <label for="persyaratan">Persyaratan</label>
                  <textarea class="textarea" rows="3" name="persyaratan"></textarea>
                  <label for="gambar">Upload Gambar</label>
                  <input type="file" class="form-control" name="gambar" class="@error('gambar') is-invalid @enderror">
            </div>
            <div class="modal-footer justify-content-between">
              <a href="{{ route('lowongan.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-rolleback" title="Kembali"></i> Kembali</a>
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