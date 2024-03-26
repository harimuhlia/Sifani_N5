@extends('frontend.frontutama')
    
@section('content')

    <!-- Blog Details Page Title & Breadcrumbs -->
    <div data-aos="fade" class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Detail Lowongan</h1>
              <p class="mb-0">Di halaman ini anda bisa membaca dan mendapatkan informasi lebih lengkap terkait Lowongan Pekerjaan seperti, Posisi Jabatan, Perusahaan, dan lainnya.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">{{ $lowongan->perusahaan }}</li>
            <li class="current">{{ $lowongan->posisi }}</li>
            <li class="current">{{ $lowongan->judul }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Blog-details Section - Blog Details Page -->
    <section id="blog-details" class="blog-details">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">
            @php
            $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
            $diff = $end_date->diff(\Carbon\Carbon::now());
            @endphp
            <article class="article">

              <div class="post-img">
                <img src="{{ asset('storage/'.$lowongan->gambar) }}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{ $lowongan->judul }}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $lowongan->user->name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">Sisa Waktu: {{ $diff->days }} Hari Lagi</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">{{ $lowongan->pendaftars->count() }} Pendaftar</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                {!! $lowongan->persyaratan !!}

              </div><!-- End post content -->

              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End meta bottom -->
              <br>
            <div class="text-center">
          @if($lowongan->pendaftars->contains('user_id', Auth::id()))
              <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Anda sudah mendaftar</button>
          @else
              @if($diff->days > 0)
                  <a href="/dashboard/lowongan-tersedia/daftar/{{ $lowongan->slug }}" class="btn btn-success btn-sm"><i class="fas fa-plus" title="Daftar"></i> Daftar Melamar</a>
              @else
                  <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i><i class="fas fa-times-circle"></i> Pendaftaran Telah Berakhir</button>
              @endif
          @endif
            </div>
            </article><!-- End post article -->
            
        <div class="col card-header text-right">
        </div>
            <div class="blog-author d-flex align-items-center">
              <img src="{{ asset('storage/'.$lowongan->user->foto_profil) }}" class="rounded-circle flex-shrink-0" alt="">
              <div>
                <h4>{{ $lowongan->user->name }}</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div>
            <!-- End post author -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              {{-- <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  <li><a href="#">General <span>(25)</span></a></li>
                </ul>
              </div><!-- End sidebar categories--> --}}

            <div class="sidebar-item recent-posts">
              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Loker List</h3>
                @forelse ($recentPost as $item)
                <div class="post-item">
                  <img src="{{ asset('storage/'.$item->gambar) }}" alt="" class="flex-shrink-0">
                  <div>
                    <h4><a href="/lowongan/{{ $lowongan->slug }}">{{ $item->judul }}</a></h4>
                    <time datetime="2020-01-01">Sisa Waktu: {{ $diff->days }} Hari Lagi</time>
                  </div>
                </div><!-- End recent post item-->
                @empty
                    
                @endforelse
              </div><!-- End sidebar recent posts-->

              {{-- <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                  <li><a href="#">App</a></li>
                </ul>
              </div><!-- End sidebar tags--> --}}

            </div><!-- End Sidebar -->

          </div>

        </div>

      </div>

    </section><!-- End Blog-details Section -->
@endsection

{{-- @extends('frontend.frontutama')
@section('title', 'Detail Lowongan Terbaru')
@section('subtitle', 'Halaman Detail Lowongan Terbaru')
    
@section('content')
<div class="container-fluid">
    @php
        $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
        $diff = $end_date->diff(\Carbon\Carbon::now());
    @endphp
    <div class="row">
        <div class="col-md-12 mx-auto d-block">
                <div class="card my-5">
                    <img src="{{ asset('storage/'.$lowongan->gambar) }}" alt="" class="img-fluid" style="width: 1110px; height: 300px; object-fit:cover;"> 
                    <div class="card-body py-5">
                        <h1>{{ $lowongan->judul }}</h1>
                        <div class="row">
                            <div class="col-md-10">
                                <p class="mb-2"><i class="bi bi-buildings"></i>  {{ $lowongan->perusahaan }}</p>
                                <p class="mb-2"><i class="bi bi-person-gear"></i> Posisi : {{ $lowongan->posisi }}</p>
                                <p class="mb-2"><i class="bi bi-people-fill"></i>  Total Pendaftar : {{ $lowongan->pendaftars->count() }}</p>
                                <p class="mb-2"><i class="bi bi-stopwatch"></i>  Sisa Waktu : {{ $diff->days }} hari {{ $diff->h }} Jam</p>
                            </div>
                            <div class="col-md-2">
                                @if($lowongan->pendaftars->contains('user_id', Auth::id()))
                                    <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-square"> </i>Anda sudah mendaftar</button>
                                @else
                                    @if($diff->days > 0)
                                        <a href="/dashboard/lowongan-tersedia/daftar/{{ $lowongan->slug }}" class="btn btn-success btn-sm"><i class="fas fa-plus" title="Daftar"></i> Daftar</a>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-square"> </i>Pendaftaran Telah Berakhir</button>
                                    @endif
                                @endif
                                
                            </div>
                        </div>

                        <hr>

                        <h5 class="mt-3">Persyaratan : </h5>
                        <p>{!! $lowongan->persyaratan !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
