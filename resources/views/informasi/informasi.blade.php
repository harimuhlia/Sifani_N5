@extends('tampilan.apputama')
@section('title', 'Informasi Terbaru')
@section('subtitle', 'Halaman Seluruh Informasi Terbaru')
    
@section('content')
   <section id="service" class="services pt-0">
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
  </section>
@endsection
