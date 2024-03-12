@extends('tampilan.apputama')
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
@endsection
