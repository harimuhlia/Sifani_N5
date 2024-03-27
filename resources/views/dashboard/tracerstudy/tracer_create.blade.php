@extends('tampilan.apputama')
@section('title', 'Membuat Data Tracer')
@section('subtitle', 'Halaman Membuat Tracer Baru')
    
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">bs-stepper</h3>
        </div>
        <div class="card-body p-0">
          <div class="bs-stepper">
            <div class="bs-stepper-header" role="tablist">
              <!-- your steps here -->
              <div class="step" data-target="#profil-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                  <span class="bs-stepper-circle">1</span>
                  <span class="bs-stepper-label">Profil</span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#status-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                  <span class="bs-stepper-circle">2</span>
                  <span class="bs-stepper-label">Status</span>
                </button>
              </div>
              <div class="line"></div>
              <div class="step" data-target="#aktifitas-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                  <span class="bs-stepper-circle">3</span>
                  <span class="bs-stepper-label">Aktifitas</span>
                </button>
              </div>
            </div>
            <div class="bs-stepper-content">
              <!-- your steps content here -->
              <div id="profil-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="{{ Auth::User()->name }}" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>NISN</label>
                        <input type="text" class="form-control" placeholder="003566852" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">== Silakan Pilih ==</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tahun Lulus</label>
                        <input type="number" class="form-control" placeholder="2018" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Ciamis" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Alamat Sesuai KTP</label>
                    <textarea class="form-control" rows="3" placeholder="Alamat Lengkap Sesuai KTP" required></textarea>
                  </div>
                <button class="btn btn-primary" onclick="stepper.next()">Next</button>
              </div>
              <div id="status-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" class="form-control" placeholder="Siti Humaeni" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" class="form-control" placeholder="Supriyadi Aswani" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status Tempat Tinggal</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">== Silakan Pilih ==</option>
                            <option>Keluarga</option>
                            <option>Sendiri</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status Pernikahan</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">== Silakan Pilih ==</option>
                            <option>Menikah</option>
                            <option>Belum Menikah</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Status Bekerja</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">== Silakan Pilih ==</option>
                            <option>Bekerja</option>
                            <option>Berwirausaha</option>
                            <option>Belum Bekerja</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status Study</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">== Silakan Pilih ==</option>
                            <option>Melanjutkan</option>
                            <option>Tidak Melanjutkan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                <button class="btn btn-primary" onclick="stepper.next()">Next</button>
              </div>
              <div id="aktifitas-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
  <script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
<section class="content">

@include('sweetalert::alert')
@endsection

@section('javascript')
    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
@endsection