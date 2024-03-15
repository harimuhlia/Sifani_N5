  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="/img/logo.png" alt=""> -->
        <h1>SIFANI</h1>
        <span>N5</span>
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/#hero" class="active">Home</a></li>
          <li><a href="/#informasi">Informasi</a></li>
          <li><a href="/lowongan">Lowongan</a></li>
          <li><a href="/#struktur">Stuktur BKK</a></li>
          <li><a href="/#faq">FAQ</a></li>
          <li><a href="/#testimoni">Testimoni</a></li>
          {{-- <li><a href="blog.html">Blog</a></li>
          <li class="dropdown has-dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dd-box-shadow">
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown has-dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down"></i></a>
                <ul class="dd-box-shadow">
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> --}}
          <li><a href="/#contact">Kontak</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->
      @guest
        @if (Route::has('login'))
          <a class="btn-getstarted" href="/login">Daftar/ Masuk</a>
        @endif
      @else
          <a class="btn-getstarted" href="/home">Dashboard</a>
      @endguest

    </div>
  </header><!-- End Header -->