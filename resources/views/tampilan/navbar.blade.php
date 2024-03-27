  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/home" class="navbar-brand">
        <img src="{{ asset('Template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>SifaniN5</strong></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/home" class="nav-link"><i class="fas fa-home"></i> Home</a>
          </li>
          @if (Auth()->User()->role == 'Administrator')
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-server"></i> Menu Utama</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('lowongan.index') }}" class="dropdown-item"><i class="fas fa-chalkboard-teacher"></i> Lowongan</a></li>
              <li><a href="{{ route('informasi.index') }}" class="dropdown-item"><i class="fas fa-volume-up"></i> Informasi</a></li>
              <li><a href="/dashboard/pendaftar" class="dropdown-item"><i class="fas fa-user"></i> Pendaftar</a></li>
              <li><a href="{{ route('visidanmisi.index') }}" class="dropdown-item"><i class="far fa-window-restore"></i> Visi Dan Misi</a></li>
              <li><a href="{{ route('inbox.index') }}" class="dropdown-item"><i class="far fa-envelope"></i> Kotak Masuk</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-server"></i> Menu Utama</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/dashboard/lowongan-tersedia/" class="dropdown-item"><i class="fas fa-chalkboard-teacher"></i> Perusahaan</a></li>
              <li><a href="/dashboard/lamaran/" class="dropdown-item"><i class="far fa-file"></i> Lamaran Anda</a></li>
              <li><a href="/informasi" class="dropdown-item"><i class="fas fa-volume-up"></i> Info Terbaru</a></li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="/dashboard/tracer" class="nav-link"><i class="fas fa-chart-bar"></i> Tracer</a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/testimoni/" class="nav-link"><i class="fas fa-box-open"></i> Testimoni</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-book-open"></i> Laporan</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Laporan 1</a></li>
              <li><a href="#" class="dropdown-item">Laporan 2</a></li>
            </ul>
          </li> --}}
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><strong>{{ Auth::User()->name }} ({{ Auth::User()->role }})</strong></a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{ route('profil.index') }}" class="dropdown-item"><i class="fas fa-user-check"></i> Profil</a></li>
            @if (Auth()->User()->role == 'Administrator')
            <li><a href="#" class="dropdown-item"><i class="fas fa-user-plus"></i> Tambah Pengguna</a></li>
            <li><a href="#" class="dropdown-item"><i class="fas fa-tools"></i> Setting</a></li>
            <li>
            @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link dropdown-item">
            <i class="fas fa-sign-out-alt"></i><a href="#"> <strong>Keluar</strong></a>
            {{ csrf_field() }}
            </form>
            </li>
          </ul>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> --}}
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->