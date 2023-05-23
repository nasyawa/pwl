@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ORGANISASI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"> ORGANISASI</li>
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
                  <h3 class="card-title">TABEL ORGANISASI NASYA</h3>
  
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
                  <a href="{{url('matakuliah/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID ORGANISASI</th>
                        <th>Nama ORGANISASI</th>
                        <th>TAHUN</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($data->count() > 0)
                        @foreach($data as $i => $m)
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$m->id}}</td>
                            <td>{{$m->nama}}</td>
                            <td>{{$m->tahun}}</td>
                            <td>
                              <!-- Bikin tombol edit dan delete -->
                              <a href="{{ url('/organisasi/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
        
                              <form method="POST" action="{{ url('/organisasi/'.$m->id) }}" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                <button type="submit" class="btn btn-sm btn-danger">detail</button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else
                        <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
                      @endif
                    </tbody>
                  </table>
                </div>
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