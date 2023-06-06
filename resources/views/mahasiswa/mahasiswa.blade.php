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
                    {{-- <a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a> --}}
                    <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>
                    <table class="table table-bordered table-striped data_mahasiswa">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>HP</th>
                          <th></th>
                          {{-- <th>Kelas</th> --}}
                          {{-- <th>Gender</th> --}}
                          {{-- <th>Place</th>
                          <th>TGL</th> --}}
                          {{-- <th>Alamat</th> --}}
                          {{-- <th>FOTO</th> --}}
                          {{-- <th>Action</th> --}}
                        </tr>
                      </thead>
                      {{-- <tbody> dihapus dulu --}}
                    </table>
                    {{-- {{$paginate->links()}} --}}
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
  <div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
    <form method="post" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal" id="form_mahasiswa">
    @csrf
    <div class="modal-dialog modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-message"></div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nim" name="nim" value="" />
                    </div>
                </div>
<div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="hp" name="hp" value="" />
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" id="button-group">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </form>
</div>
  @endsection
  @push('customjs')
  <script>
    function updateData(th){
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Edit Data Mahasiswa');
        $('#modal_mahasiswa #nim').val($(th).data('nim'));
        $('#modal_mahasiswa #nama').val($(th).data('nama'));
        $('#modal_mahasiswa #hp').val($(th).data('hp'));
        $('#modal_mahasiswa #form_mahasiswa').attr('action', $(th).data('url'));
        $('#modal_mahasiswa #form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
    }

    function detailData(th){
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Detail Data Mahasiswa');
        $('#modal_mahasiswa #nim').val($(th).data('nim')).prop('disabled', true);
        $('#modal_mahasiswa #nama').val($(th).data('nama')).prop('disabled', true);
        $('#modal_mahasiswa #hp').val($(th).data('hp')).prop('disabled', true);
    }

    $(document).ready(function (){
        var dataMahasiswa = $('.data_mahasiswa').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                'url': '{{  url('mahasiswa/data') }}',
                'dataType': 'json',
                'type': 'POST',
            },
            columns:[
                {data:'nomor', name:'nomor', searchable:false, sortable:false},
                {data:'nim',name:'nim', sortable: false, searchable: true},
                {data:'nama',name:'nama', sortable: false, searchable: true},
                {data:'hp',name:'hp', sortable: false, searchable: true},
                {data:'id',name:'id', sortable: false, searchable: false,
                    render: function(data, type, row, meta){
                        var btn = `<button data-url="{{ url('/mahasiswa')}}/`+data+`" class="btn btn-xs btn-warning" onclick="updateData(this)" 
                        data-id="`+row.id+`" data-nim="`+row.nim+`" data-nama="`+row.nama+`" data-hp="`+row.hp+`">
                        <i class="fa fa-edit"></i> Edit</button>` +

                            `<a class="btn btn-xs btn-info" onclick="detailData(this)" 
                            data-id="`+row.id+`" data-nim="`+row.nim+`" data-nama="`+row.nama+`" data-hp="`+row.hp+`" 
                            ><i class="fa fa-list"></i> Detail</a>` +

                            `<form method="POST" action="{{ url('/mahasiswa') }}/`+row.id+`">
                                    @csrf @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>`;
                        return btn;
                    }
                },

            ]
        });
    });
    // javascript utk simpan data
            $('#form_mahasiswa').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success:function(data){
                    $('.form-message').html('');
                    if(data.status){
                        $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                        $('#form_mahasiswa')[0].reset();
                        dataMahasiswa.ajax.reload();
                        $('#form_mahasiswa').attr('action', '{{ url('mahasiswa') }}');
                        $('#form_mahasiswa').find('input[name="_method"]').remove();
                    }else{
                        $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                        alert('error');
                    }

                    if(data.modal_close){
                        $('.form-message').html('');
                        $('#modal_mahasiswa').modal('hide');
                    }

                }
            });
        });
  </script>
  @endpush