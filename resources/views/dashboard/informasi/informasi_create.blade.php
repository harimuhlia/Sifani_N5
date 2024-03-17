@extends('tampilan.apputama')
@section('title', 'Membuat Informasi Baru')
@section('subtitle', 'Halaman Membuat Informasi Baru')
    
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Formulir Untuk Menambah Informasi Baru</h3>
                <div class="card-tools">
                  {{-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a> --}}
                </div>
              </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data" action="{{ action('App\Http\Controllers\DashboardInformasiController@store')}}">
                @csrf
                <div class="card-body">
                  <label for="JudulInformasi">Judul Informasi</label>
                  <input class="form-control" type="text" id="judulinformasi" name="judulinformasi" class="@error('judulinformasi') is-invalid @enderror">
                  <label for="persyaratan">Deskripsi</label>
                  <textarea class="textarea" rows="3" name="deskripsi"></textarea>
                  <label for="fileupload">Upload File</label>
                  <input type="file" class="form-control" name="fileupload">
            </div>
            <div class="modal-footer justify-content-between">
              <a href="{{ route('informasi.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-rolleback" title="Kembali"></i> Kembali</a>
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