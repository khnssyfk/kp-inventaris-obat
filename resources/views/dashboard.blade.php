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
