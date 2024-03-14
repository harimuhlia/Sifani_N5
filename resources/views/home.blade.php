@extends('tampilan.apputama')
@section('title', 'Dashboard')
@section('subtitle', 'Halaman Utama')

@section('content')
<section class="content">
<div class="container-fluid">
{{-- <h5 class="mb-2">Info Box</h5> --}}
<div class="row">
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
<div class="info-box-content">
<span class="info-box-text">Messages</span>
<span class="info-box-number">1,410</span>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
<div class="info-box-content">
<span class="info-box-text">Bookmarks</span>
<span class="info-box-number">410</span>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
<div class="info-box-content">
<span class="info-box-text">Uploads</span>
<span class="info-box-number">13,648</span>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
<div class="info-box-content">
<span class="info-box-text">Likes</span>
<span class="info-box-number">93,139</span>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('javascript')
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
