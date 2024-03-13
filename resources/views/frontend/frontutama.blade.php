<!DOCTYPE html>
<html lang="en">

<head>
@csrf
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIFANI - Sistem Informasi Alumni</title>
  <meta content="Aplikasi Bursa Kerja Khusus Dan Treacer Study SMKN 5 Kabupaten Tangerang" name="description">
  <meta content="BKK, Bursa Kerja Khusus, BKK SMK, BKK N5, Treacer Study, Alumni, BKK SMKN 5 Kabupaten Tangerang" name="keywords">

  @include('frontend.style')

  <!-- =======================================================
  * Template Name: Append
  * Updated: Mar 12 2024 with Bootstrap v5.3.3
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

@include('frontend.header')

  <main id="main">
@yield('content')
  </main>

@include('frontend.footer')

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
@include('frontend.script')
</body>
</html>