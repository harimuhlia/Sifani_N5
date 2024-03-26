@extends('frontend.frontutama')

@section('content')

    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">
      <img src="{{ asset('Frontend') }}/img/hero-bg2.jpg" alt="" data-aos="fade-in">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang Di SIFANI</h2>
            <p data-aos="fade-up" data-aos-delay="200">SIFANI (Sistem Informasi Alumni) Menyediakan berbagai informasi Lowongan Pekerjaan dan juga Tracer Study SMK Negeri 5 Kabupaten Tangerang.</p>
          </div>
          <div class="col-lg-5">
            <form action="#" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
              <input type="text" class="form-control" placeholder="Misalkan Loker Tangerang">
              <input type="submit" class="btn btn-primary" value="Search">
            </form>
          </div>
        </div>
      </div>

    </section><!-- End Hero Section -->

    <!-- Clients Section - Home Page -->
    <section id="clients" class="clients">

      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('Frontend') }}/img/clients/client-1.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('Frontend') }}//img/clients/client-2.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('Frontend') }}//img/clients/client-3.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('Frontend') }}//img/clients/client-4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('Frontend') }}//img/clients/client-5.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('Frontend') }}//img/clients/client-6.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- End Clients Section -->

    <!-- About Section - Home Page -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>Tentang BKK</h3>
            <h2>Bursa Kerja Khusus (BKK) SMKN 5 Kab. Tangerang</h2>
            <p>Adalah sebagai wadah bagi alumni SMKN 5 Kabupaten Tangerang yang membutuhkan informasi lowongan pekerjaan dan peningkatan mutu lulusan melalui pelatihan-pelatihan dan rekruitmen.</p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Bekerja</h3>
                  <p>Bertujuan untuk mempersiapkan peserta didik agar dapat langsung masuk ke dunia kerja yang diinginkan</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Wirausaha</h3>
                  <p>Membimbing dan menyalurkan setiap Alumni untuk mengikuti pelatihan-pelatihan keterampilan.</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Melanjutkan</h3>
                  <p>Senantiasa menjembatani setiap Alumni yang akan terus melanjutkan Study ke Kampus pilihannya</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Tracer Study</h3>
                  <p>Mendata setiap Alumni untuk tujuan mengetahui hasil pendidikan dalam bentuk transisi dari dunia pendidikan ke dunia usaha dan industri</p>
                </div>
              </div> <!-- End Icon Box -->
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- Services Section - Home Page -->
    <section id="visimisi" class="services">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Visi Misi BKK</h2>
        <p>Visi, Misi dan Program Kerja BKK SMK Negeri 5 Kabupaten Tangerang</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          @foreach ($visimisi as $visimisi)
          <i class="bi bi-quote quote-icon-left"></i>
            <span>{{ $visimisi->visi }}</span>
          <i class="bi bi-quote quote-icon-right"></i>
            
            {!! $visimisi->misi !!}
            {!! $visimisi->proker !!}
          @endforeach
        </div>
      </div>
    </div>
    </section><!-- End Services Section -->

    <!-- Stats Section - Home Page -->
    <section id="stats" class="stats">

      <img src="{{ asset('Frontend') }}//img/stats-bg2.jpg" alt="" data-aos="fade-in">
      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $pendaftarCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pendaftar</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $lowonganCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Lowongan Kerja</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $informasiCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Informasi</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $alumniCount }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Alumni</p>
            </div>
          </div><!-- End Stats Item -->
        </div>
      </div>

    </section><!-- End Stats Section -->

    <!-- Services Section - Home Page -->
    <section id="informasi" class="services">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Informasi Terbaru</h2>
        <p>Segala Informasi Terbaru akan kami sampaikan disini seperti, Jadwal Rekruitmen, Wawancara dan lain-lain.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          @foreach ($informasis as $informasi)
          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="/informasi/{{ $informasi->slug }}" class="stretched-link">{{ $informasi->judulinformasi }}</a></h4>
                {{-- <p class="p-0"><i class="bi bi-clock"></i> {{ $informasi->created_at->diffForhumans() }}</p> --}}
                <p class="p-0">{{ $informasi->excerpt }} <a href="/informasi/{{ $informasi->slug }}" style="text-decoration: none">Baca selengkapnya...</a></p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->
          @endforeach
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- Recent-posts Loker Terbaru Section - Home Page -->
    <section id="recent-posts" class="recent-posts">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Loker Terbaru</h2>
        <p>Pastikan Lowongan Kerja Yang Anda Cari Masih Dibuka, Jika Ada Yang Sesuai Dengan Minat Anda Untuk Segera Mendaftar</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
            @foreach ($newLowongan as $lowongan)
                @php
                    $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
                    $diff = $end_date->diff(\Carbon\Carbon::now());
                @endphp
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>
              <div class="post-img">
                <img src="{{ asset('storage/'.$lowongan->gambar) }}" alt="" class="img-fluid">
              </div>
              <p class="post-category">Minimarket</p>
              <h2 class="title">
                <a href="/lowongan/{{ $lowongan->slug }}">{{ $lowongan->judul }}</a>
              </h2>
              <div class="d-flex align-items-center">
                <img src="{{ asset('Frontend') }}//img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">Maria Doe</p>
                  <p class="post-date">
                    <time datetime="Y-m-d H:i:s">Dipost {{ $lowongan->created_at->diffForhumans()}}</time>
                  </p>
                  <p class="post-category card-text text-danger">
                    @if($diff->days > 0)
                        Lowongan Ditutup: {{ $diff->days }} Hari Lagi
                    @else
                        Pendaftaran Di Tutup
                    @endif
                  </p>
                </div>
              </div>
            </article>
          </div>
          @endforeach
          <!-- End post list item -->
        </div>
        <!-- End recent posts list -->
      </div>

    </section><!-- End Recent-posts Section -->

    <!-- Team Section - Home Page -->
    <section id="struktur" class="team">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Struktur Organisasi</h2>
        <p>Struktur Organisasi Bursa Kerja Khusus (BKK) SMK Negeri 5 Kabupaten Tangerang</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="{{ asset('Frontend') }}//img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
            <div class="member-img">
              <img src="{{ asset('Frontend') }}//img/team/team-2.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Sarah Jhonson</h4>
              <span>Product Manager</span>
              <p>Labore ipsam sit consequatur exercitationem rerum laboriosam laudantium aut quod dolores exercitationem ut</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
            <div class="member-img">
              <img src="{{ asset('Frontend') }}//img/team/team-3.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>William Anderson</h4>
              <span>CTO</span>
              <p>Illum minima ea autem doloremque ipsum quidem quas aspernatur modi ut praesentium vel tque sed facilis at qui</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
            <div class="member-img">
              <img src="{{ asset('Frontend') }}//img/team/team-4.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <p>Magni voluptatem accusamus assumenda cum nisi aut qui dolorem voluptate sed et veniam quasi quam consectetur</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
            <div class="member-img">
              <img src="{{ asset('Frontend') }}//img/team/team-5.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Brian Doe</h4>
              <span>Marketing</span>
              <p>Qui consequuntur quos accusamus magnam quo est molestiae eius laboriosam sunt doloribus quia impedit laborum velit</p>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="600">
            <div class="member-img">
              <img src="{{ asset('Frontend') }}//img/team/team-6.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4>Josepha Palas</h4>
              <span>Operation</span>
              <p>Sint sint eveniet explicabo amet consequatur nesciunt error enim rerum earum et omnis fugit eligendi cupiditate vel</p>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- End Team Section -->

    <!-- Faq Section - Home Page -->

    <section id="faq" class="faq">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="content px-xl-5">
              <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3><span class="num">1.</span> <span>Non consectetur a erat nam at lectus urna duis?</span></h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">2.</span> <span>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</span></h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">3.</span> <span>Dolor sit amet consectetur adipiscing elit pellentesque?</span></h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">4.</span> <span>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</span></h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">5.</span> <span>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</span></h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
        </div>

      </div>

    </section><!-- End Faq Section -->

    <!-- Testimonials Section - Home Page -->
    <section id="testimoni" class="testimonials">

      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
            <h3>Testimoni Alumni</h3>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
            </p>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

            <div class="swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
              <div class="swiper-wrapper">
                @foreach ($testipage as $testi)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <img src="{{ asset('storage/' . $testi->user->foto_profil) }}" class="testimonial-img flex-shrink-0" alt="">
                      <div>
                        <h3>{{ $testi->user->name }}</h3>
                        <h4>Alumni Kelas: {{ $testi->user->kelas }}</h4>
                        <div class="stars">
                          @for($i=1; $i<=$testi->star_rating; $i++)
                            <i class="bi bi-star-fill"></i>
                          @endfor
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>{{ $testi->testimoni }}</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Testimonials Section -->

    <!-- Call-to-action Section - Home Page -->
    <section id="call-to-action" class="call-to-action">

      <img src="{{ asset('Frontend') }}//img/cta-bg.jpg" alt="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Call To Action</h3>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End Call-to-action Section -->
@endsection