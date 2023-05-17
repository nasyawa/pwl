<html>
    <head>
        <title>Membuat Laporan PDF dengan DOMPDF Laravel</title>
    </head>
    <body>
        <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
        </style>
        <center>
            <h5>Laporan Aktikel</h5>
        </center>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judu</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $a)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$a->title}}</td>
                    <td>{{$a->content}}</td>
                    <td>{{$a->featured_image}}</td>
                </tr>   
                @endforeach
            </tbody>
        </table>
    </body>
</html>