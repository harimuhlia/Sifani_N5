@extends('tampilan.apputama')
@section('title', 'Detail Informasi')
@section('subtitle', 'Halaman Detail Informasi')
    
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Detail Informasi Terbaru</h3>
          <div class="card-tools">
            <a href="{{ route('informasi.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
            <a href="/dashboard/informasi/{{ $informasi->slug }}/edit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</i></a>
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
                <td>Informasi</td>
                <td>: {{ $informasi->judulinformasi }}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <td>File Info</td>
                <td>: <a href="{{ asset('fileinformasi/'.$informasi->fileupload) }}">{{ basename($informasi->fileupload) }}
                </td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <td>Deskripsi</td>
                <td> {!! $informasi->deskripsi !!}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

    {{-- <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
            <div class="card-tools">
              <a href="{{ route('informasi.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-rolleback" title="Kembali"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <h1 class="mt-3">{{ $informasi->judulinformasi }}</h1>
            <p>{!! $informasi->deskripsi !!}</p>
            <h4><a href="{{ asset('fileinformasi/'.$informasi->fileupload) }}">{{ basename($informasi->fileupload) }}</h4>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div> --}}
    <!-- /.row -->
  </div>
@endsection