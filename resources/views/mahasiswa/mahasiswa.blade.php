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
                    <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          {{-- <th>Gender</th> --}}
                          {{-- <th>Place</th>
                          <th>TGL</th> --}}
                          <th>Alamat</th>
                          <th>HP</th>
                          <th>FOTO</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($mhs->count() > 0)
                          @foreach($paginate as $i => $m)
                            <tr>
                              <td>{{++$i}}</td>
                              <td>{{$m->nim}}</td>
                              <td>{{$m->nama}}</td>
                              <td>{{$m->kelas !== null ? $m->kelas->nama_kelas: 'none'}}</td>
                              {{-- <td>{{$m->jk}}</td> --}}
                              {{-- <td>{{$m->tempat_lahir}}</td>
                              <td>{{$m->tanggal_lahir}}</td> --}}
                              <td>{{$m->alamat}}</td>
                              <td>{{$m->hp}}</td>
                              <td>
                                <img src="/storage/{{$m->foto}}" width="50px">
                              </td>
                              <td>
                                <!-- Bikin tombol edit dan delete show -->
                                <a href="{{ url('/mahasiswa/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
                                <a href="{{ url('/nilai/'. $m->id) }}" class="btn btn-sm btn-warning">nilai</a>
                                <form method="POST" action="{{ url('/mahasiswa/'.$m->id) }}" >
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                </form>

                                <a href="{{ route('mahasiswa.show', [$m->id]) }}" 
                                  class="btn btn-sm btn-warning">show</a>
                              </td>
                            </tr>
                          @endforeach
                        @else
                          <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
                        @endif
                      </tbody>
                    </table>
                    {{$paginate->links()}}
                  </div>
                  <!-- /.card-body -->
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