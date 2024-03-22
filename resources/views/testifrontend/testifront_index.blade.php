@extends('frontend.frontutama')

@section('content')   
@include('tampilan.style')   
<!-- Blog Page Title & Breadcrumbs -->
<div data-aos="fade" class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Testimoni Alumni</h1>
            <p class="mb-0">Disini anda bisa melihat seluruh Testimoni tentang BKK SMK Negeri 5 Kabupaten Tangerang dari sisi Kinerja dan atau Pelayanan yang telah diberikan oleh BKK.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">Testimoni Alumni</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Blog Section - Blog Page -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
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
                        @foreach ($testifront as $item)
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
                              <a href="/testimoni/{{ $item->id }}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
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
      <!-- End blog posts list -->

      <div class="pagination d-flex justify-content-center">
        <ul>
          {{ $testifront->links() }}
        </ul>
      </div><!-- End pagination -->
      
    </div>

  </section><!-- End Blog Section -->

@endsection

@section('javascript')
@include('tampilan.script')
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
