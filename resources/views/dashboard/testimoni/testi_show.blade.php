@extends('tampilan.apputama')
@section('title', 'Data Testimoni')
@section('subtitle', 'Halaman Seluruh Data Testimoni')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Detail Testimoni</h3>
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
                  <td> {{ $testimoni->user->name }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Bintang Rating</td>
                  <td>
                    <div class="rated">
                      @for($i=1; $i<=$testimoni->star_rating; $i++)
                      <label class="star-rating-complete" title="text">{{$i}} stars</label>
                      @endfor
                    </div>
                  </td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Kelas</td>
                  <td> {{ $testimoni->user->kelas }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                  <td>Testimoni</td>
                  <td> {{ $testimoni->testimoni }}</td>
                </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>Action</td>
                    <td>
                      <a href="/dashboard/testimoni/{{ $testimoni->id }}/edit" class="btn btn-primary  btn-sm"><i class="far fa-edit"></i> Edit</a>
                        <form id="{{ $testimoni->id }}" action="/dashboard/testimoni/{{ $testimoni->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Testimoni Ini?')"><i class="far fa-trash-alt"></i> Hapus</button>
                        </form>
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
</div> 
@endsection
 