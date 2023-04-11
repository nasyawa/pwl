@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KELUARGA</h1>
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
                  <h3 class="card-title">TABEL KELUARGA NASYA</h3>
  
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
                        {!!(isset($keluarga))?method_field('PUT'):''!!}

                        <div class="form-group">
                            <label> Nama Anggota Keluarga </label>
                            <input class="form-control @error('keluarga') is-invalid @enderror" value="{{isset($keluarga)?$keluarga->nama:old('nama')}}" type="text" name="nama"/>
                            @error('keluarga')
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