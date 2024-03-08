@extends('tampilan.apputama')
@section('title', 'Data Lowongan Tersedia')
@section('subtitle', 'Halaman Seluruh Data Lowongan Tersedia')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Lowongan Tersedia</h3>
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
                    <th>Posisi</th>
                    <th>Batas Waktu</th>
                    <th>Daftar</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($lowongans as $lowongan)
                    @php
                        $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
                        $diff = $end_date->diff(\Carbon\Carbon::now());
                    @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('gambarlowongan/'.$lowongan->gambar) }}" alt="gambar-perusahaan" style="width: 70px"; height="50px"></td>
                            <td>{{ $lowongan->perusahaan }}</td>
                            <td>{{ $lowongan->posisi }}</td>
                            <td>{{ $lowongan->batas_waktu }}</td>
                            <td>
                                {{-- Mengecek apakah user yang sedang login sudah mendaftar di lowongan ini atau belum --}}
                                @if($lowongan->pendaftars->contains('user_id', Auth::id()))
                                    <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-square"> </i>Anda sudah mendaftar</button>
                                @else
                                    @if($diff->days > 0)
                                        <a href="/dashboard/lowongan-tersedia/daftar/{{ $lowongan->slug }}" class="btn btn-success btn-sm"><i class="fas fa-plus" title="Daftar"></i> Daftar</a>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-square"> </i>Pendaftaran Telah Berakhir</button>
                                    @endif
                                @endif
                            </td>
                        </tr>  
                    @endforeach                     
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Batas Waktu</th>
                    <th>Daftar</th>
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