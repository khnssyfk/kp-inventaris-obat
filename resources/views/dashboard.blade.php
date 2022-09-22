@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Dashboard</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="wrapper">
        <h5> <strong>Total Obat Masuk & Keluar </strong> </h5>
        <canvas id="myChart"></canvas>
      </div>
    <div class="wrapper-big col-md-6">
        <h5> <strong>Jumlah Obat Masuk & Keluar per Bulan</strong> </h5>
        <canvas id="bulanChart"></canvas>

    </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Penggunaan Obat Terbanyak</h5>
        <form action="{{ route('Dashboard.getObatTerbanyak') }}" method="POST" id="search-obat-banyak">
          @csrf
          {{-- @method('PUT') --}}
          <select class="form-select mb-3 d-inline" style='width:120px' name="bulan" aria-label="Default select example">
            <option disabled>Pilih Bulan</option>
            @if($bulan == '01')
              <option value="01" selected>Januari</option>
              @else
              <option value="01">Januari</option>
            @endif
            @if($bulan == '02')
              <option value="02" selected>Februari</option>
              @else
              <option value="02">Februari</option>
            @endif
            @if($bulan == '03')
              <option value="03" selected>Maret</option>
              @else
              <option value="03">Maret</option>
            @endif
            @if($bulan == '04')
              <option value="04" selected>April</option>
              @else
              <option value="04">April</option>
            @endif
            @if($bulan == '05')
              <option value="05" selected>Mei</option>
              @else
              <option value="05">Mei</option>
            @endif
            @if($bulan == '06')
              <option value="06" selected>Juni</option>
              @else
              <option value="06">Juni</option>
            @endif
            @if($bulan == '07')
              <option value="07" selected>Juli</option>
              @else
              <option value="07">Juli</option>
            @endif
            @if($bulan == '08')
              <option value="08" selected>Agustus</option>
              @else
              <option value="08">Agustus</option>
            @endif
            @if ($bulan == '09')
              <option value="09" selected>September</option>
              @else
              <option value="09">September</option>
            @endif
            @if($bulan == '10')
              <option value="10" selected>Oktober</option>
              @else
              <option value="10">Oktober</option>
            @endif
            @if($bulan == '11')
              <option value="11" selected>November</option>
              @else
              <option value="11">November</option>
            @endif
            @if($bulan == '12')
              <option value="12" selected>Desember</option>
              @else
              <option value="12">Desember</option>
            @endif
            
          </select>
          <select class="form-select mb-3 d-inline" name="tahun" style='width:120px' aria-label="Default select example">
            <option disabled>Pilih Tahun</option>
            @if($tahun == 2022)
              <option value="2022" selected>2022</option>
              @else
              <option value="2022">2022</option>
            @endif
            @if($tahun == 2023)
              <option value="2023" selected>2023</option>
              @else
              <option value="2023">2023</option>
            @endif
            @if($tahun == 2024)
              <option value="2024" selected>2024</option>
              @else
              <option value="2024">2024</option>
            @endif
            @if($tahun == 2025)
              <option value="2025" selected>2025</option>
              @else
              <option value="2025">2025</option>
            @endif
            @if($tahun == 2026)
              <option value="2026" selected>2026</option>
              @else
              <option value="2026">2026</option>
            @endif
            @if($tahun == 2027)
              <option value="2027" selected>2027</option>
              @else
              <option value="2027">2027</option>
            @endif
          
          </select>
          <button class="btn btn-success mx-1 mb-1">Filter</button>
        </form>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            @foreach($query as $value)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->dataobat->nama_obat}}</td>
                <td>{{ $value->total }}</td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
  
    </div>

  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Penggunaan Obat Terdikit</h5>
        <form action="{{ route('Dashboard.getObatTerbanyak') }}" method="POST" id="search-obat-banyak">
          @csrf
          {{-- @method('PUT') --}}
          <select class="form-select mb-3 d-inline" style='width:120px' name="bulan_1" aria-label="Default select example">
            <option disabled>Pilih Bulan</option>
            @if($bulan_1 == '01')
              <option value="01" selected>Januari</option>
              @else
              <option value="01">Januari</option>
            @endif
            @if($bulan_1 == '02')
              <option value="02" selected>Februari</option>
              @else
              <option value="02">Februari</option>
            @endif
            @if($bulan_1 == '03')
              <option value="03" selected>Maret</option>
              @else
              <option value="03">Maret</option>
            @endif
            @if($bulan_1 == '04')
              <option value="04" selected>April</option>
              @else
              <option value="04">April</option>
            @endif
            @if($bulan_1 == '05')
              <option value="05" selected>Mei</option>
              @else
              <option value="05">Mei</option>
            @endif
            @if($bulan_1 == '06')
              <option value="06" selected>Juni</option>
              @else
              <option value="06">Juni</option>
            @endif
            @if($bulan_1 == '07')
              <option value="07" selected>Juli</option>
              @else
              <option value="07">Juli</option>
            @endif
            @if($bulan_1 == '08')
              <option value="08" selected>Agustus</option>
              @else
              <option value="08">Agustus</option>
            @endif
            @if ($bulan_1 == '09')
              <option value="09" selected>September</option>
              @else
              <option value="09">September</option>
            @endif
            @if($bulan_1 == '10')
              <option value="10" selected>Oktober</option>
              @else
              <option value="10">Oktober</option>
            @endif
            @if($bulan_1 == '11')
              <option value="11" selected>November</option>
              @else
              <option value="11">November</option>
            @endif
            @if($bulan_1 == '12')
              <option value="12" selected>Desember</option>
              @else
              <option value="12">Desember</option>
            @endif
            
          </select>
          <select class="form-select mb-3 d-inline" name="tahun_1" style='width:120px' aria-label="Default select example">
            <option disabled>Pilih Tahun</option>
            @if($tahun_1 == 2022)
              <option value="2022" selected>2022</option>
              @else
              <option value="2022">2022</option>
            @endif
            @if($tahun_1 == 2023)
              <option value="2023" selected>2023</option>
              @else
              <option value="2023">2023</option>
            @endif
            @if($tahun_1 == 2024)
              <option value="2024" selected>2024</option>
              @else
              <option value="2024">2024</option>
            @endif
            @if($tahun_1 == 2025)
              <option value="2025" selected>2025</option>
              @else
              <option value="2025">2025</option>
            @endif
            @if($tahun_1 == 2026)
              <option value="2026" selected>2026</option>
              @else
              <option value="2026">2026</option>
            @endif
            @if($tahun_1 == 2027)
              <option value="2027" selected>2027</option>
              @else
              <option value="2027">2027</option>
            @endif
          
          </select>
          <button class="btn btn-success  mx-1 mb-1">Filter</button>
        </form>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            @foreach($query_1 as $value)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->dataobat->nama_obat}}</td>
                <td>{{ $value->total }}</td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
  
    </div>

  </div>
  

</div>
  
<div class="row">
  <div class="col-md">
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h3>Obat</h3>
        </div>
        <form action="{{ route('Dashboard.getObatKosong') }}" method="POST" id="search-obat-banyak">
          @csrf
          {{-- @method('PUT') --}}
          <select class="form-select mb-3 d-inline" style='width:120px' name="bulan_2" aria-label="Default select example">
            <option disabled>Pilih Bulan</option>
            @if($bulan_2 == '01')
              <option value="01" selected>Januari</option>
              @else
              <option value="01">Januari</option>
            @endif
            @if($bulan_2 == '02')
              <option value="02" selected>Februari</option>
              @else
              <option value="02">Februari</option>
            @endif
            @if($bulan_2 == '03')
              <option value="03" selected>Maret</option>
              @else
              <option value="03">Maret</option>
            @endif
            @if($bulan_2 == '04')
              <option value="04" selected>April</option>
              @else
              <option value="04">April</option>
            @endif
            @if($bulan_2 == '05')
              <option value="05" selected>Mei</option>
              @else
              <option value="05">Mei</option>
            @endif
            @if($bulan_2 == '06')
              <option value="06" selected>Juni</option>
              @else
              <option value="06">Juni</option>
            @endif
            @if($bulan_2 == '07')
              <option value="07" selected>Juli</option>
              @else
              <option value="07">Juli</option>
            @endif
            @if($bulan_2 == '08')
              <option value="08" selected>Agustus</option>
              @else
              <option value="08">Agustus</option>
            @endif
            @if ($bulan_2 == '09')
              <option value="09" selected>September</option>
              @else
              <option value="09">September</option>
            @endif
            @if($bulan_2 == '10')
              <option value="10" selected>Oktober</option>
              @else
              <option value="10">Oktober</option>
            @endif
            @if($bulan_2 == '11')
              <option value="11" selected>November</option>
              @else
              <option value="11">November</option>
            @endif
            @if($bulan_2 == '12')
              <option value="12" selected>Desember</option>
              @else
              <option value="12">Desember</option>
            @endif
            
          </select>
          <select class="form-select mb-3 d-inline" name="tahun_2" style='width:120px' aria-label="Default select example">
            <option disabled>Pilih Tahun</option>
            @if($tahun_2 == 2022)
              <option value="2022" selected>2022</option>
              @else
              <option value="2022">2022</option>
            @endif
            @if($tahun_2 == 2023)
              <option value="2023" selected>2023</option>
              @else
              <option value="2023">2023</option>
            @endif
            @if($tahun_2 == 2024)
              <option value="2024" selected>2024</option>
              @else
              <option value="2024">2024</option>
            @endif
            @if($tahun_2 == 2025)
              <option value="2025" selected>2025</option>
              @else
              <option value="2025">2025</option>
            @endif
            @if($tahun_2 == 2026)
              <option value="2026" selected>2026</option>
              @else
              <option value="2026">2026</option>
            @endif
            @if($tahun_2 == 2027)
              <option value="2027" selected>2027</option>
              @else
              <option value="2027">2027</option>
            @endif
          
          </select>
          <button class="btn btn-success  mx-1 mb-1">Filter</button>
        </form>
        <a href="/lap-obt-kosong" target="_blank" class="btn btn-primary" style="margin-top: -6rem;margin-left:20rem"><i class="bi bi-printer-fill "></i> Cetak Data</a>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach($query_1 as $value)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->dataobat->nama_obat}}</td>
                <td>{{ $value->total }}</td>
              </tr>
            @endforeach --}}
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Obat Masuk', 'Obat Keluar'],
        datasets: [{
    label: 'Total Obat Masuk & Keluar',
    data: [{{ $obt_masuk }},{{ $obt_keluar }}],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
    ],
    hoverOffset: 4
  }]
    },
    option:{
        maintainAspectRatio:false,
        responsive: true
    }
});

const bulan = document.getElementById('bulanChart');
const DATA_COUNT = 7;
const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
const myBulan = new Chart(bulan, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        datasets: [{
            label: 'Obat Masuk',
            data: [{{ $msk_jan }},{{ $msk_feb }},{{ $msk_mar }},{{ $msk_apr }},{{ $msk_mei }},{{ $msk_jun }},{{ $msk_jul }},{{ $msk_agu }},{{ $msk_sep }},{{ $msk_okt }},{{ $msk_nov }},{{ $msk_des }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        },{
            label: 'Obat Keluar',
            data: [{{ $klr_jan }},{{ $klr_feb }},{{ $klr_mar }},{{ $klr_apr }},{{ $klr_mei }},{{ $klr_jun }},{{ $klr_jul }},{{ $klr_agu }},{{ $klr_sep }},{{ $klr_okt }},{{ $klr_nov }},{{ $klr_des }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1 
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
// const bulanChart = new Chart (bulan,{
//     type: 'bar',
//     data: {
//         labels: 'Jumlah Obat Masuk & Keluar per Bulan',
//         datasets: [
//         {
//         label: 'Dataset 1',
//         data: Utils.numbers(NUMBER_CFG),
//         borderColor: Utils.CHART_COLORS.red,
//         backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
//         },
//         {
//         label: 'Dataset 2',
//         data: Utils.numbers(NUMBER_CFG),
//         borderColor: Utils.CHART_COLORS.blue,
//         backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
//         }]
//     },
//     options: {
//       responsive: true,
//       plugins: {
//         legend: {
//           position: 'top',
//         },
//         title: {
//           display: true,
//           text: 'Chart.js Bar Chart'
//         }
//       }
//     },
//   })
</script>
   
@endsection
