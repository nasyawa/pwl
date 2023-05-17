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
              <li class="breadcrumb-item"><a href="/">Artikel</a></li>
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
                  <h3 class="card-title">ARTIKEL NASYA</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{$url_form}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control"
                           required="required" name="title" value="{{$article->title}}"></br>
                            </div>                           
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" class="form-control"
                           required="required" name="content" value="{{$article->content}}"></br>
                            </div>
                               
                        <div class="form-group">
                            <label for="image">Feature Image</label>
                            <input type="file" class="form-control"
                            required="required" name="image" value="{{$article->featured_image}}"></br>
                                <img width="150px" src="{{asset('storage/'.$article->featured_image)}}">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
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
