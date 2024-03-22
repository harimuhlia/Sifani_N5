@extends('tampilan.apputama')
@section('title', 'Data Testimoni')
@section('subtitle', 'Halaman Seluruh Data Testimoni')
    
@section('content')
<section class="content">
<!-- Tampilan Dashboard Index Testimoni Untuk Administrator --> 
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
                  <td>{{ $item->user->name }}</td>
                  <td>
                    <div class="rated">
                      @for($i=1; $i<=$item->star_rating; $i++)
                      <label class="star-rating-complete" title="text">{{$i}} stars</label>
                      @endfor
                    </div>
                  </td>
                  <td>{!! Str::limit("$item->testimoni", 20, ' ...') !!}</td></td>
                  <td>
                      <a href="/dashboard/testimoni/{{ $item->id }}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                      <a href="/dashboard/testimoni/{{ $item->id }}/edit" class="btn btn-primary  btn-sm"><i class="far fa-edit"></i></a>
                      {{-- <a href="/dashboard/lowongan/{{ $item->slug }}/edit" class="btn btn-warning  btn-sm"><i class="far fa-edit"></i></i></a> --}}
                      <form id="{{ $item->id }}" action="/dashboard/testimoni/{{ $item->id }}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Testimoni Ini?')"><i class="far fa-trash-alt"></i></button>
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

  <!-- Tampilan Dashboard Index Testimoni Untuk Alumni --> 
  @else
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Detail Testimoni</h3>
            <div class="card-tools">
              <a href="{{ route('testimoni.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus" title="Buat Visi Misi"></i> Buat Testimoni</a>
            </div>
          </div>
          <!-- ./card-header -->
          <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($testimoni as $testi)
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Nama Pengirim</td>
                  <td> {{ $testi->user->name }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Bintang Rating</td>
                  <td>
                    <div class="rated">
                      @for($i=1; $i<=$testi->star_rating; $i++)
                      <label class="star-rating-complete" title="text">{{$i}} stars</label>
                      @endfor
                    </div>
                  </td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Kelas</td>
                  <td> {{ $testi->user->kelas }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Testimoni</td>
                  <td> {{ $testi->testimoni }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Action</td>
                    <td>
                      <a href="/dashboard/testimoni/{{ $testi->id }}/edit" class="btn btn-primary  btn-sm"><i class="far fa-edit"></i> Edit</a>
                        <form id="{{ $testi->id }}" action="/dashboard/testimoni/{{ $testi->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Testimoni Ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>  
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