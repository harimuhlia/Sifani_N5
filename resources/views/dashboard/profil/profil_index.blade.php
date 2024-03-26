@extends('tampilan.apputama')
@section('title', 'Data Profil')
@section('subtitle', 'Halaman Profil Pengguna')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                @if ($profilusers->foto_profil)
                    <img src="{{ asset('storage/' . $profilusers->foto_profil) }}" alt="Foto Profil" id="preview" class="img-fluid rounded mb-5" width="200px" height="200px">
                @else
                    <img src="/folderassets/img/avatars/avatar.png" alt="Foto Profil" id="preview" class="img-fluid rounded mb-5" width="200px" height="200px">
                    <p class="text-danger">Ini adalah foto Default, upload foto anda !</p>
                @endif
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">{{ Auth::user()->role }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-primary card-outline p-2">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Name Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" disabled value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="role" class="col-sm-3 col-form-label">Role User</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->role }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->kelas }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="inputExperience" disabled placeholder="Experience">{{ Auth::user()->alamat }}</textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <a href="{{ route('profil.edit', Auth::user()->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit Profil</a>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@include('sweetalert::alert')
@endsection