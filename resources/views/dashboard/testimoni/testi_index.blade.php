@extends('tampilan.apputama')
@section('title', 'Data Testimoni')
@section('subtitle', 'Halaman Seluruh Data Testimoni')
    
@section('content')
<section class="content">
  <style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
        }
        .rate:not(:checked) > input {
        position:absolute;
        display: none;
        }
        .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
        }
        .rated:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
        }
        .rate:not(:checked) > label:before {
        content: '★ ';
        }
        .rate > input:checked ~ label {
        color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
        }
        .star-rating-complete{
           color: #c59b08;
        }
        .rating-container .form-control:hover, .rating-container .form-control:focus{
        background: #fff;
        border: 1px solid #ced4da;
        }
        .rating-container textarea:focus, .rating-container input:focus {
        color: #000;
        }
   
        .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
        }
        .rated:not(:checked) > input {
        position:absolute;
        display: none;
        }
        .rated:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ffc700;
        }
        .rated:not(:checked) > label:before {
        content: '★ ';
        }
        .rated > input:checked ~ label {
        color: #ffc700;
        }
        .rated:not(:checked) > label:hover,
        .rated:not(:checked) > label:hover ~ label {
        color: #deb217;
        }
        .rated > input:checked + label:hover,
        .rated > input:checked + label:hover ~ label,
        .rated > input:checked ~ label:hover,
        .rated > input:checked ~ label:hover ~ label,
        .rated > label:hover ~ input:checked ~ label {
        color: #c59b08;
        }
   </style>  
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
                  <td>Bintang <span class="badge badge-pill badge-warning">{{ $item->star_rating }}</span></td>
                  <td>{!! Str::limit("$item->testimoni", 20, ' ...') !!}</td></td>
                  <td>
                      <a href="/dashboard/lowongan/{{ $item->id }}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                      <a href="/dashboard/testimoni/{{ $item->id }}/edit" class="btn btn-primary  btn-sm"><i class="far fa-edit"></i> Edit</a>
                      {{-- <a href="/dashboard/lowongan/{{ $item->slug }}/edit" class="btn btn-warning  btn-sm"><i class="far fa-edit"></i></i></a> --}}
                      <form id="{{ $item->id }}" action="/dashboard/lowongan/{{ $item->id }}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus {{ $item->judul }} ?')"><i class="far fa-trash-alt"></i></button>
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
                    Bintang <span class="badge badge-pill badge-warning">{{ $testi->star_rating }}</span>
                    {{-- <div class="rate">
                      <input type="radio" id="star5" class="rate" name="rating" value="{{ $testi->star_rating }}"/>
                      <label for="star5" title="Istimewa">5 stars</label>
                      <input type="radio" checked id="star4" class="rate" name="rating" value="{{ $testi->star_rating }}"/>
                      <label for="star4" title="Sempurna">4 stars</label>
                      <input type="radio" id="star3" class="rate" name="rating" value="{{ $testi->star_rating }}"/>
                      <label for="star3" title="Sangat Baik">3 stars</label>
                      <input type="radio" id="star2" class="rate" name="rating" value="{{ $testi->star_rating }}">
                      <label for="star2" title="Baik">2 stars</label>
                      <input type="radio" id="star1" class="rate" name="rating" value="{{ $testi->star_rating }}"/>
                      <label for="star1" title="Cukup">1 star</label>
                    </div> --}}
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
                        <form id="{{ $testi->name }}" action="/dashboard/testimoni/{{ $testi->name }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Visi dan Misi Ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
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