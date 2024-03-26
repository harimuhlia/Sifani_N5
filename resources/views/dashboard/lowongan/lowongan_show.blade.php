@extends('tampilan.apputama')
@section('title', 'Detail Lowongan')
@section('subtitle', 'Halaman Detail Lowongan')
    
@section('content')
<div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Detail Lowongan Kerja</h3>
                <div class="card-tools">
                  <a href="{{ route('lowongan.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                  <a href="/dashboard/lowongan/{{ $lowongan->slug }}/edit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</i></a>
                </div>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>Loker Info</td>
                      <td>: {{ $lowongan->judul }}</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>Perusahaan</td>
                      <td>: {{ $lowongan->perusahaan }}</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>Batas Pendaftaran</td>
                      <td>: {{ Carbon\Carbon::createFromTimeString($lowongan->batas_waktu)->format('d F Y') }}</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>Posisi Jabatan</td>
                      <td>: {{ $lowongan->posisi }}</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>Persyaratan</td>
                      <td> {!! $lowongan->persyaratan !!}</td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>Foto Loker</td>
                      <td>
                        <img src="{{ asset('storage/'.$lowongan->gambar) }}" class="img-fluid mb-5" alt="gambar utama" style="overflow:hidden; border: 1px solid black" width="700px">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
  </div>
@endsection