@extends('layout')

@section('title')
    Tahun Lahir
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/charts/apexcharts.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-gradient.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
@endsection

@section('content')
    <div class="row">
        @foreach ($data['total'] as $item)
            <div class="col col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $item['tahun_lahir'] }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div>
                                <canvas id="tahun-lahir-chart-{{ $loop->index }}" height="250"></canvas>
                            </div>
                            <div>
                                <canvas id="aplikasi-chart-{{ $loop->index }}" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/vendors/js/charts/chart.min.js') }}"></script>
    <script>
        $(window).on("load", function () {

        var primary = '#7367F0';
        var success = '#28C76F';
        var danger = '#EA5455';
        var warning = '#FF9F43';
        var label_color = '#1E1E1E';
        var grid_line_color = '#dae1e7';
        var scatter_grid_color = '#f3f3f3';
        var scatter_point_light = '#D1D4DB';
        var scatter_point_dark = '#5175E0';
        var white = '#fff';
        var black = '#000';

        var poor = '#C0392B';
        var fair = '#E74C3C';
        var good = '#F39C12';
        var verygood = '#2ECC71';
        var excellent = '#27AE60';

        var themeColors = [poor, fair, good, verygood, excellent, primary];

        async function chart() {
            const response = await fetch('http://localhost:8000/api/tahun-lahir')
            const data = await response.json()
            let i = 0
            console.log(data)

            for (item of data) {
                var labels = []
                var jumlah = []
                var aplikasi = []

                // console.log(item['Sangat Rendah'])
                // Sangat Rendah
                labels.push('Sangat Rendah')
                if (item.nilai.hasOwnProperty('Sangat Rendah')) {
                    jumlah.push(item.nilai['Sangat Rendah'])
                    aplikasi.push(item.aplikasi['Sangat Rendah'])
                } else {
                    jumlah.push(0)
                    aplikasi.push(0)
                }

                // Rendah
                labels.push('Rendah')
                if (item.nilai.hasOwnProperty('Rendah')) {
                    jumlah.push(item.nilai['Rendah'])
                    aplikasi.push(item.aplikasi['Rendah'])
                } else {
                    jumlah.push(0)
                    aplikasi.push(0)
                }

                // Sedang
                labels.push('Sedang')
                if (item.nilai.hasOwnProperty('Sedang')) {
                    jumlah.push(item.nilai['Sedang'])
                    aplikasi.push(item.aplikasi['Sedang'])
                } else {
                    jumlah.push(0)
                    aplikasi.push(0)
                }

                // Tinggi
                labels.push('Tinggi')
                if (item.nilai.hasOwnProperty('Tinggi')) {
                    jumlah.push(item.nilai['Tinggi'])
                    aplikasi.push(item.aplikasi['Tinggi'])
                } else {
                    jumlah.push(0)
                    aplikasi.push(0)
                }

                // Sangat Tinggi
                labels.push('Sangat Tinggi')
                if (item.nilai.hasOwnProperty('Sangat Tinggi')) {
                    jumlah.push(item.nilai['Sangat Tinggi'])
                    aplikasi.push(item.aplikasi['Sangat Tinggi'])
                } else {
                    jumlah.push(0)
                    aplikasi.push(0)
                }
                console.log(jumlah)

                // Bar Chart
                // ------------------------------------------

                //Get the context of the Chart canvas element we want to select
                var barChartctx = $("#tahun-lahir-chart-"+i);

                // Chart Options
                var barchartOptions = {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each bar to be 2px wide
                    elements: {
                        rectangle: {
                        borderWidth: 2,
                        borderSkipped: 'left'
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    responsiveAnimationDuration: 500,
                    legend: { display: false },
                    scales: {
                        xAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        }
                        }],
                        yAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        },
                        ticks: {
                            stepSize: 1000
                        },
                        }],
                    },
                    title: {
                        display: true,
                        text: 'Pengetahuan'
                    }

                };

                // Chart Data
                var barchartData = {
                labels: labels,
                datasets: [{
                    label: "Responden",
                    data: jumlah,
                    backgroundColor: themeColors,
                    borderColor: "transparent"
                }]
                };

                var barChartconfig = {
                type: 'bar',

                // Chart Options
                options: barchartOptions,

                data: barchartData
                };

                // Create the chart
                var barChart = new Chart(barChartctx, barChartconfig);
                
                // Nilai Aplikasi Chart
                // ------------------------------------------

                //Get the context of the Chart canvas element we want to select
                var barChartctx2 = $("#aplikasi-chart-"+i);

                // Chart Options
                var barchartOptions2 = {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each bar to be 2px wide
                    elements: {
                        rectangle: {
                        borderWidth: 2,
                        borderSkipped: 'left'
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    responsiveAnimationDuration: 500,
                    legend: { display: false },
                    scales: {
                        xAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        }
                        }],
                        yAxes: [{
                            display: true,
                            gridLines: {
                                color: grid_line_color,
                            },
                            scaleLabel: {
                                display: true,
                            },
                            ticks: {
                                stepSize: 1000,
                                max: 50
                            },
                        }],
                    },
                    title: {
                        display: true,
                        text: 'Nilai Aplikasi'
                    },
                    scaleOverride : true,
                    scaleSteps : 10,
                    scaleStepWidth : 50,
                    scaleStartValue : 0 

                };

                // Chart Data
                var barchartData2 = {
                labels: labels,
                datasets: [{
                    label: "Nilai rata-rata",
                    data: aplikasi,
                    backgroundColor: themeColors,
                    borderColor: "transparent"
                }]
                };

                var barChartconfig2 = {
                type: 'bar',

                // Chart Options
                options: barchartOptions2,

                data: barchartData2
                };

                // Create the chart
                var barChart2 = new Chart(barChartctx2, barChartconfig2);

                i++
            }
        }

        chart()

        });
    </script>
@endsection