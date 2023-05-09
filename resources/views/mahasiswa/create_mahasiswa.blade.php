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
                        {!!(isset($mhs))?method_field('PUT'):''!!}

                        <div class="form-group">
                            <label> Nim </label>
                            <input class="form-control @error('nim') is-invalid @enderror" value="{{isset($mhs)?$mhs->nim:old('nim')}}" type="text" name="nim"/>
                            @error('nim')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Nama </label>
                            <input class="form-control @error('nama') is-invalid @enderror" value="{{isset($mhs)?$mhs->nama:old('nama')}}" type="text" name="nama"/>
                            @error('nama')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Tanggal Lahir </label>
                            <input class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{isset($mhs)?$mhs->tanggal_lahir:old('tanggal_lahir')}}" type="date" name="tanggal_lahir"/>
                            @error('tanggal_lahir')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                          </div>
                          
                        <div class="form-group">
                            <label> JK </label>
                            <input class="form-control @error('jk') is-invalid @enderror" value="{{isset($mhs)?$mhs->jk:old('jk')}}" type="text" name="jk"/>
                            @error('jk')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Tempat Lahir </label>
                            <input class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{isset($mhs)?$mhs->tempat_lahir:old('tempat_lahir')}}" type="text" name="tempat_lahir"/>
                            @error('tempat_lahir')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Alamat </label>
                            <input class="form-control @error('alamat') is-invalid @enderror" value="{{isset($mhs)?$mhs->alamat:old('alamat')}}" type="text" name="alamat"/>
                            @error('alamat')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> hp </label>
                            <input class="form-control @error('hp') is-invalid @enderror" value="{{isset($mhs)?$mhs->hp:old('hp')}}" type="text" name="hp"/>
                            @error('hp')
                            <span class="error_invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="Kelas">Kelas</label>
                          <select class="form-control" name="kelas_id">
                            @foreach ($kelas as $kls)
                            <option value="{{$kls->id}}"{{isset($mhs) ? $mhs->kelas_id==$kls->id?'selected':'' : ''}}>{{$kls->nama_kelas}}</option>
                            @endforeach
                          </select>
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