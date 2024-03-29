@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MAHASISWA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">HOME</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">TABEL MAHASISWA NASYA</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ $url_form }}">
                        @csrf
                        {!!(isset($matkul))?method_field('PUT'):''!!}

                        <div class="form-group">
                            <label> Nama Matkul </label>
                            <input class="form-control @error('matkul') is-invalid @enderror" value="{{isset($matkul)?$matkul->matkul:old('matkul')}}" type="text" name="matkul"/>
                            @error('matkul')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label> SKS  </label>
                          <input class="form-control @error('matkul') is-invalid @enderror" value="{{isset($matkul)?$matkul->matkul:old('matkul')}}" type="text" name="matkul"/>
                          @error('matkul')
                          <span class="error_invalid-feedback">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label> Jam </label>
                        <input class="form-control @error('matkul') is-invalid @enderror" value="{{isset($matkul)?$matkul->matkul:old('matkul')}}" type="text" name="matkul"/>
                        @error('matkul')
                        <span class="error_invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label> Semester</label>
                      <input class="form-control @error('matkul') is-invalid @enderror" value="{{isset($matkul)?$matkul->matkul:old('matkul')}}" type="text" name="matkul"/>
                      @error('matkul')
                      <span class="error_invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </form>
                <!-- /.card-body -->
             </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @push('customjs')
  @endpush