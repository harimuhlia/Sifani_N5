@extends('frontend.frontutama')

@section('content')   
@include('tampilan.style')   
<!-- Blog Page Title & Breadcrumbs -->
<div data-aos="fade" class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Detail Testimoni Alumni</h1>
            <p class="mb-0">Halaman Detail untuk melihat Lebih lanjut isi Testomoni yang telah diberikan oleh para Alumni.</p>
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
                    <h3 class="card-title">Tabel Detail Testimoni</h3>
                    <div class="card-tools">
                        <a href="/testimoni" class="btn btn-primary btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
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
                        <tr data-widget="expandable-table" aria-expanded="false">
                          <td>Nama Pengirim</td>
                          <td> {{ $testifront->user->name }}</td>
                        </tr>
                        <tr data-widget="expandable-table" aria-expanded="false">
                          <td>Bintang Rating</td>
                          <td>
                            <div class="rated">
                              @for($i=1; $i<=$testifront->star_rating; $i++)
                              <label class="star-rating-complete" title="text">{{$i}} stars</label>
                              @endfor
                            </div>
                          </td>
                        </tr>
                        <tr data-widget="expandable-table" aria-expanded="false">
                          <td>Kelas</td>
                          <td> {{ $testifront->user->kelas }}</td>
                        </tr>
                        <tr data-widget="expandable-table" aria-expanded="false">
                          <td>Testimoni</td>
                          <td> {{ $testifront->testimoni }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
        </div> 
      
    </div>

  </section><!-- End Blog Section -->

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
