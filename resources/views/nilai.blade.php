<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h3>
    <br><br>
    <h2 class="text-center"><b>KARTU HASIL STUDI (KHS)</b></h2>
    <br>
    <div class="container">
        <h5><b>Nama :</b> {{$mhs->nama}} </h5>
        <h5><b>NIM :</b> {{$mhs->nim}} </h5>
        <h5><b>Kelas :</b> {{$mhs->kelas->nama_kelas}} </h5>
        <br><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Matkul</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$d->matakuliah->nama_matkul}}</td>
                        <td>{{$d->matakuliah->sks}}</td>
                        <td>{{$d->matakuliah->semester}}</td>
                        <td>{{$d->nilai}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>