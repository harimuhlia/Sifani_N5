@extends('frontend.frontutama')

@section('content')      
<!-- Blog Page Title & Breadcrumbs -->
<div data-aos="fade" class="page-title">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Blog</h1>
            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">Blog</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Blog Section - Blog Page -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4 posts-list">
        @foreach ($lowongans as $lowongan)
            @php
            $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
            $diff = $end_date->diff(\Carbon\Carbon::now());
            @endphp
        <div class="col-xl-4 col-lg-6">
            
          <article>
            <div class="post-img">
              <img src="{{ asset('storage/'.$lowongan->gambar) }}" alt="" class="img-fluid">
            </div>

            <p class="post-category">Politics</p>

            <h2 class="title">
              <a href="/lowongan/{{ $lowongan->slug }}">{{ $lowongan->judul }}</a>
            </h2>

            <div class="d-flex align-items-center">
              <img src="{{ asset('Frontend') }}/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author">{{ $lowongan->user->name }}</p>
                <p class="post-date">
                  <time datetime="2022-01-01">Jan 1, 2022</time>
                </p>
              </div>
            </div>
            
          </article>
         
      </div>
      @endforeach
      <!-- End blog posts list -->

      <div class="pagination d-flex justify-content-center">
        <ul>
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
        </ul>
      </div><!-- End pagination -->
      
    </div>

  </section><!-- End Blog Section -->

@endsection

<!-- ======= Services Section ======= -->
   {{-- <section id="service" class="services pt-0">
        <div class="container my-5" data-aos="fade-up">
            <div class="row">
                @foreach ($lowongans as $lowongan)
                @php
                    $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
                    $diff = $end_date->diff(\Carbon\Carbon::now());
                @endphp
                    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="card d-flex flex-column justify-content-between">
                            <img src="{{ asset('storage/'.$lowongan->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body mt-auto">
                                <h5 class="card-title">{{ $lowongan->judul }}</h5>
                                <h6 class="card-text text-danger">
                                    @if($diff->days > 0)
                                        Sisa Waktu: {{ $diff->days }} hari, {{ $diff->h }} jam
                                    @else
                                        Pendaftaran Di Tutup
                                    @endif
                                </h6>
                            </div>
                            <div class="card-footer">
                            @if($lowongan->pendaftars->contains('user_id', Auth::id()))
                                    <a href="/dashboard/lowongan-tersedia/" class="btn btn-sm btn-danger mt-3 text-decoration-none">Anda sudah mendaftar</a>
                                @else
                                <a href="/lowongan/{{ $lowongan->slug }}" class="text-decoration-none btn btn-sm btn-primary btn-sm">Detail</a>
                                @if ($diff->days > 0)
                                    <a href="/dashboard/lowongan-tersedia/" class="btn btn-sm btn-success mt-3 text-decoration-none">Daftar</a>
                                @else
                                    <button href="/" class="btn btn-sm btn-danger mt-3 text-decoration-none">Lowongan Ditutup</button>
                                @endif
                            @endif
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>
            {{ $lowongans->links() }}
        </div>
  </section> --}}
