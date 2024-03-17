@extends('tampilan.apputama')
@section('title', 'Informasi Terbaru')
@section('subtitle', 'Halaman Seluruh Informasi Terbaru')
    
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tabel Detail Informasi Terbaru</h3>
      </div>
      <!-- ./card-header -->
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Info</th>
              <th>Deskripsi</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($informasis as $informasi)
            <tr data-widget="expandable-table" aria-expanded="false">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $informasi->judulinformasi }}</td>
              <td>{{ $informasi->excerpt }}</td>
              <td>
                <a href="/informasi/{{ $informasi->slug }}" class="btn btn-success btn-sm"><i class="far fa-eye"></i> Lihat</a>
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

   {{-- <section id="service" class="services pt-0">
    @foreach ($informasis as $informasi)
        <div class="container mt-5" data-aos="fade-up">
            <div class="row">
              <div class="col-md-12 mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h3 class="p-0">{{ $informasi->judulinformasi }}</h3>
                    <p class="p-0"><i class="bi bi-clock"></i> {{ $informasi->created_at->diffForhumans() }}</p>
                    <p class="p-0">{{ $informasi->excerpt }} <a href="/informasi/{{ $informasi->slug }}" style="text-decoration: none">Baca selengkapnya...</a></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center mt-5">
          {{ $informasis->links() }}
        </div>
  </section> --}}
@endsection
