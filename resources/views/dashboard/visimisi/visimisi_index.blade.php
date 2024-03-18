@extends('tampilan.apputama')
@section('title', 'Visi Misi')
@section('subtitle', 'Halaman Visi Misi BKK')
    
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Detail Visi Misi BKK</h3>
            <div class="card-tools">
              <a href="{{ route('visimisi.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus" title="Buat Visi Misi"></i> Buat VisiMisi</a>
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
                @foreach ($visimisi as $visimisi)
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Judul</td>
                  <td> {{ $visimisi->judul }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Visi</td>
                  <td> {{ $visimisi->visi }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Misi</td>
                  <td> {!! $visimisi->misi !!}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Motivasi</td>
                  <td> {!! $visimisi->motivasi !!}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Action</td>
                    <td>
                      <a href="/dashboard/visimisi/{{ $visimisi->slug }}/edit" class="btn btn-warning  btn-sm"><i class="far fa-edit"></i></i></a>
                        <form id="{{ $visimisi->slug }}" action="/dashboard/visimisi/{{ $visimisi->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Visi dan Misi Ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
