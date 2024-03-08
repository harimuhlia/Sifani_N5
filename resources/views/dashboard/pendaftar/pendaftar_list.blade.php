@extends('tampilan.apputama')
@section('title', 'List Pendaftar')
@section('subtitle', 'Halaman List Pendaftar')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Seluruh Data Informasi</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm">{{ $pendaftar->perusahaan }}</button>
                <a href="/dashboard/pendaftar/print-pdf/{{ $pendaftar->slug }}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-filetype-pdf"></i> Print Pdf</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Daftar</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pendaftar->pendaftars as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kode_pendaftaran }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->asal_sekolah }}</td>
                </tr>  
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Daftar</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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