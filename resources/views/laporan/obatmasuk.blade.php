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
                <p>LAPORAN OBAT MASUK</p>
                <p style="margin-top:-1rem"> Periode Tanggal {{ date('d-m-Y', strtotime($tgl_mulai)) }} s/d {{ date('d-m-Y', strtotime($tgl_selesai)) }}</p>
            </div>
    
            <table class="table table-bordered border border-2 border-dark">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Tgl Masuk</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Apotek</th>
                    <th scope="col">Expired</th>
                </thead>
                <tbody>
                    @foreach($obatmasuks as $obatmasuk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d-m-Y', strtotime($obatmasuk->tgl_masuk)) }}</td>
                            <td>{{ $obatmasuk->kode_transaksi }}</td>
                            <td>{{ $obatmasuk->dataobat->nama_obat }}</td>
                            <td>{{ $obatmasuk->jumlah }}</td>
                            <td>{{ $obatmasuk->dataobat->satuan }}</td>
                            <td>{{ $obatmasuk->nama_apotek }}</td>
                            <td>{{ date('d-m-Y', strtotime($obatmasuk->expired ))}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
          </div>

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>