@extends('tampilan.apputama')
@section('title', 'Detail Isi Pesan')
@section('subtitle', 'Halaman Detail Pesan')
    
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Detail Isi Pesan Masuk</h3>
          <div class="card-tools">
            <a href="{{ route('inbox.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
            <form id="{{ $kotakmasuk->slug }}" action="/dashboard/inbox/{{ $kotakmasuk->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Pesan Dari {{ $kotakmasuk->nama }} ?')"><i class="far fa-trash-alt"></i> Hapus</button>
            </form>
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
                <td>Nama Pengirim</td>
                <td>: {{ $kotakmasuk->nama }}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <td>Email</td>
                <td>: {{ $kotakmasuk->email }}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <td>Subjek</td>
                <td>: {{ $kotakmasuk->subjek }}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <td>Isi Pesan</td>
                <td> {!! $kotakmasuk->isipesan !!}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  </div>
@endsection