@extends('frontend.frontutama')

@section('content')      
<section id="contact" class="contact">

    <!--  Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Contact</h2>
      <p>Silakan Datang atau Hubungi kami dan Kirim Pesan Spesifik Melalui Form Kontak</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-item" data-aos="fade" data-aos-delay="200">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>A108 Adam Street</p>
                <p>New York, NY 535022</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item" data-aos="fade" data-aos-delay="300">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
                <p>+1 6678 254445 41</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item" data-aos="fade" data-aos-delay="400">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com</p>
                <p>contact@example.com</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item" data-aos="fade" data-aos-delay="500">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday</p>
                <p>9:00AM - 05:00PM</p>
              </div>
            </div><!-- End Info Item -->

          </div>

        </div>

        <div class="col-lg-6">
          <form action="{{ action('App\Http\Controllers\WelcomeController@store')}}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            @csrf
            <div class="row gy-4">
              <div class="col-md-6">
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap Anda" required>
              </div>
              <div class="col-md-6 ">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Aktif Anda" required>
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control @error('subjek') is-invalid @enderror" name="subjek" placeholder="Perihal Yang Akan Ditanyakan" required>
              </div>
              <div class="col-md-12">
                <textarea class="form-control @error('isipesan') is-invalid @enderror" name="isipesan" rows="6" placeholder="Silakan isi pesan anda" required></textarea>
              </div>
              <div class="col-md-12 text-center">
                
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div><!-- End Contact Form -->
      </div>
    </div>
  </section><!-- End Contact Section -->
  @include('sweetalert::alert')
@endsection