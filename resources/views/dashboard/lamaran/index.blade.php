@extends('tampilan.apputama')
@section('title', 'Data Lamaran Anda')
@section('subtitle', 'Halaman Seluruh Data Lamaran')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Lamaran Anda</h3>
              <div class="card-tools">
                {{-- <a href="" class="btn btn-success btn-sm"><i class="fas fa-upload" title="Tambah Data"></i> Import</a> --}}
                @if (Auth()->User()->role == 'Administrator')
                <a href="{{ route('informasi.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Informasi</a>
                @endif
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($lamaran as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lowongan->perusahaan}}</td>
                    <td>{{ $item->lowongan->posisi}}</td> 
                    <td>
                        <a href="/dashboard/lamaran/cetak/{{ $item->lowongan->slug }}" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Print</a>
                        <a href="/dashboard/lamaran/edit/{{ $item->lowongan->slug }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>
                        <form id="{{ $item->id }}" action="/dashboard/lamaran/{{ $item->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Lamaran Anda Di {{ $item->lowongan->perusahaan }} ?')"><i class="far fa-trash-alt"></i> Hapus</button>
                            {{-- <div type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Lamaran Anda Di {{ $item->lowongan->perusahaan }} ?')" data-form="{{ $item->id }}">Hapus</div> --}}
                        </form>
                    </td>         
                </tr>  
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Jabatan</th>
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