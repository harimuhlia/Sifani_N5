@extends('tampilan.apputama')
@section('title', 'Data Perusahaan')
@section('subtitle', 'Halaman Seluruh Data Perusahaan')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Perusahaan</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Perusahaan</th>
                  <th>Pekerjaan</th>
                  <th>Lihat Pendaftar</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($lowongan as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('gambarlowongan/'.$item->gambar) }}" alt="gambar-perusahaan" style="width: 110px"; height="70px">
                    </td>
                    <td>{{ $item->perusahaan }}</td>
                    <td>{{ $item->posisi }}</td>
                    <td>
                        <a href="/dashboard/pendaftar/{{ $item->slug }}" class="btn btn-success btn-sm">Lihat Pendaftar</a>
                    </td>
                </tr>  
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Perusahaan</th>
                    <th>Pekerjaan</th>
                    <th>Lihat Pendaftar</th>
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