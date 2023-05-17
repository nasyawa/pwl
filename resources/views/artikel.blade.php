@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ARTIKEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">ARTIKEL</li>
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
                  <h3 class="card-title">TABEL ARTIKEL NASYA</h3>
  
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
                <a href="{{url('artikel/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CONTENT</th>
                        <th>FEATURE IMAGE</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d -> id }}</td>
                            <td>{{ $d -> title }}</td>
                            <td>{{ $d -> content }}</td>
                            <td>
                              <img src="/storage/{{$d->featured_image}}" width="60px">
                            </td>
                            <td>
                              <div style="display: flex">
                                <a style="margin-right: 5px" href="{{url('artikel/'.$d->id.'/edit')}}" class="btn btn-warning">Edit</a>
                                <form method="POST" action="{{url('artikel/'.$d->id)}}">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">Hapus</button>
                                </form>
                              </div>
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
          <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @push('customjs')
  @endpush