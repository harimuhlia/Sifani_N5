@extends('tampilan.apputama')
@section('title', 'Inbox')
@section('subtitle', 'Halaman Seluruh Inbox')
    
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Kotak Masuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Subjek</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($kotakmasuk as $inbox)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inbox->nama }}</td>
                    <td>{{ $inbox->email }}</td>
                    <td>{{ $inbox->subjek }}</td>
                    <td>
                        <a href="/dashboard/inbox/{{ $inbox->slug }}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                        <form id="{{ $inbox->slug }}" action="/dashboard/inbox/{{ $inbox->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Pesan Dari {{ $inbox->nama }} ?')"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>  
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  @include('sweetalert::alert')
@endsection
