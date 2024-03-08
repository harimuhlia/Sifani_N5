@extends('tampilan.apputama')
@section('title', 'Data Lowongan')
@section('subtitle', 'Halaman Seluruh Data Lowongan')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Lowongan</h3>
              <div class="card-tools">
                {{-- <a href="" class="btn btn-success btn-sm"><i class="fas fa-upload" title="Tambah Data"></i> Import</a> --}}
                @if (Auth()->User()->role == 'Administrator')
                <a href="{{ route('lowongan.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Lowongan</a>
                @endif
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Perusahaan</th>
                  <th>Posisi</th>
                  <th>Batas Waktu</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($lowongan as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->perusahaan }}</td>
                    <td>{{ $item->posisi }}</td>
                    <td>{{ $item->batas_waktu }}</td>
                    <td>
                        <a href="/dashboard/lowongan/{{ $item->slug }}" class="btn btn-success btn-sm">L</a>
                        <a href="/dashboard/lowongan/{{ $item->slug }}/edit" class="btn btn-warning  btn-sm">E</i></a>
                        <form id="{{ $item->slug }}" action="/dashboard/lowongan/{{ $item->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus {{ $item->judul }} ?')">D</button>
                            {{-- <div class="btn btn-danger mb-2 swal-confirm" type="submit" onclick="return confirm('Yakin Akan Menghapus {{ $item->judul }} ?')">D</i></div> --}}
                        </form>
                    </td>
                </tr>  
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Perusahaan</th>
                  <th>Posisi</th>
                  <th>Batas Waktu</th>
                  <th>Opsi</th>
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