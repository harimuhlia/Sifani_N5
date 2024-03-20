@extends('tampilan.apputama')
@section('title', 'Data Testimoni')
@section('subtitle', 'Halaman Seluruh Data Testimoni')
    
@section('content')
<section class="content">
  @if (Auth()->User()->role == 'Administrator')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Seluruh Data Testimoni</h3>
            <div class="card-tools">
              <a href="{{ route('testimoni.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Testimoni</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Pengirim</th>
                <th>Hasil Rating</th>
                <th>Testimoni</th>
                <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($testimoni as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->user->nama }}</td>
                  <td>{{ $item->star_rating }}</td>
                  <td>{{ $item->testimoni }}</td></td>
                  <td>
                      <a href="/dashboard/lowongan/{{ $item->slug }}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                      <a href="/dashboard/lowongan/{{ $item->slug }}/edit" class="btn btn-warning  btn-sm"><i class="far fa-edit"></i></i></a>
                      <form id="{{ $item->slug }}" action="/dashboard/lowongan/{{ $item->slug }}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus {{ $item->judul }} ?')"><i class="far fa-trash-alt"></i></button>
                          {{-- <div class="btn btn-danger mb-2 swal-confirm" type="submit" onclick="return confirm('Yakin Akan Menghapus {{ $item->judul }} ?')">D</i></div> --}}
                      </form>
                  </td>
              </tr>  
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                  <th>No</th>
                  <th>Nama Pengirim</th>
                  <th>Hasil Rating</th>
                  <th>Testimoni</th>
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
  @else
  Testimoni Alumni    
  @endif
 
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