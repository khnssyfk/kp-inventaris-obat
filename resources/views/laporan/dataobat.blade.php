{{-- <img src="/images/logo/melifeid.png" height="80px" class="mx-auto d-block"alt=""> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="/css/bootstrap.css">  --}}
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* hr{
            border: 1px solid red;
        } */
    </style>
</head>
<body>
    <div class="text-center">
        <img src="/images/logo/melifeid.png" height="60px" class="mt-4 mb-2" alt="...">
        <h3>Yayasan Melife Indonesia Gamaswani</h3>
    </div>
        <div class="px-5">
            <hr class="border border-dark">
            <div class="text-center">
                <p>LAPORAN DATA OBAT</p>
                <p style="margin-top:-1rem">{{ $tgl }}</p>
            </div>
    
            <table class="table table-bordered border border-2 border-dark">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Kode Obat</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Dosis</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Jenis Obat</th>
                    <th scope="col">Kemasan</th>
                    <th scope="col">Bentuk Obat</th>
                </thead>
                <tbody>
                    @foreach($data_obats as $data_obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data_obat->kode_obat }}</td>
                                    <td>{{ $data_obat->nama_obat }}</td>
                                    <td>{{ $data_obat->berat_obat }}</td>
                                    <td>{{ $data_obat->satuan_berat_obat }}</td>
                                    <td>{{ $data_obat->merk_obat }}</td>
                                    <td>{{ $data_obat->jenis_obat->jenis_obat }}</td>
                                    <td>{{ $data_obat->kemasan_obat->keterangan }} {{ $data_obat->kemasan_obat->jumlah }}</td>
                                    <td>{{ $data_obat->kemasan_obat->bentukobat->bentuk_obat }}</td>
                                </tr>
                                @endforeach
                </tbody>
            </table>
          </div>

          <script type="text/javascript">
            window.print()
        </script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>