@extends('tampilan.apputama')
@section('title', 'Dashboard')
@section('subtitle', 'Halaman Utama')

@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
      <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
      <div class="info-box-content">
      <span class="info-box-text">Lowongan</span>
    <span class="info-box-number">{{ $lowonganCount }} Loker Dibagikan</span>
  </div>
  </div>
</div>

<div class="col-md-3 col-sm-6 col-12">
  <div class="info-box">
    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Informasi</span>
    <span class="info-box-number">{{ $informasiCount }} Info Diberikan</span>
    </div>
  </div>
</div>

<div class="col-md-3 col-sm-6 col-12">
  <div class="info-box">
    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Alumni</span>
    <span class="info-box-number">{{ $alumniCount }} Alumni Terdaftar</span>
    </div>
  </div>
</div>

<div class="col-md-3 col-sm-6 col-12">
  <div class="info-box">
    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Testimoni</span>
    <span class="info-box-number">{{ $testimoniCount }} Testi Alumni</span>
    </div>
    </div>
    </div>
  </div>
</div>
@endsection