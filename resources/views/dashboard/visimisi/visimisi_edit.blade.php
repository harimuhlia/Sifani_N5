@extends('tampilan.apputama')
@section('title', 'Membuat Data Visi Misi')
@section('subtitle', 'Halaman Membuat Visi Misi')
    
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Formulir Untuk Edit Visi Misi</h3>
                <div class="card-tools">
                </div>
              </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('visidanmisi.update', $visidanmisi->slug )}}" method="POST">
                @method("PUT")
                @csrf
                <div class="card-body">
                  <label for="JudulLowongan">Judul Visi Misi</label>
                  <input class="form-control" type="text" id="judul" value="{{ old('judul', $visidanmisi->judul) }}" name="judul" class="@error('judul') is-invalid @enderror">
                  <label for="posisi">Visi</label>
                  <input class="form-control" type="text" id="visi" value="{{ old('visi', $visidanmisi->visi) }}" name="visi" class="@error('visi') is-invalid @enderror">
                  <label for="persyaratan">Misi</label>
                  <textarea class="textarea" rows="3" id="misi" name="misi">{{ old('misi', $visidanmisi->misi) }}</textarea>
                  <label for="persyaratan">Motivasi</label>
                  <textarea class="textarea" rows="3" id="motivasi" name="motivasi">{{ old('motivasi', $visidanmisi->proker) }}</textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="{{ route('visidanmisi.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
              <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
              </form>
          </div>
          <!-- /.card -->
</section>
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