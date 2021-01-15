@extends('layout')

@section('title')
    Pekerjaan
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
    {{-- <div class="card">
        <div class="card-header">
            <h4 class="card-title">Pekerjaan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="hidden" id="data-1">0</div>
                <div class="hidden" id="data-2">1</div>
                <canvas id="pekerjaan-chart-comparison" height="250"></canvas>
            </div>
        </div>
    </div> --}}
    
    <div class="row">
        @foreach ($data['total'] as $item)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $item['pekerjaan'] }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div>
                                <canvas id="pekerjaan-chart-{{ $loop->index }}" height="250"></canvas>
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
    {{-- <script>
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
                let id1 = document.getElementById("data-1").innerHTML;
                let id2 = document.getElementById("data-2").innerHTML;
                const response1 = await fetch('http://localhost:8000/api/jenis-kelamin/' + id1)
                const response2 = await fetch('http://localhost:8000/api/jenis-kelamin/' + id2)
                const data1 = await response1.json()
                const data2 = await response2.json()

                console.log(data1)
                console.log(data2)

                var labels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi']
                var label1 = data1.label
                var label2 = data2.label
                var jumlah1 = []
                var jumlah2 = []

                // Dataset 1
                // ------------------------------------------

                // Sangat Rendah
                if (data1.nilai.hasOwnProperty('Sangat Rendah')) {
                    jumlah1.push(data1.nilai['Sangat Rendah'])
                } else {
                    jumlah1.push(0)
                }

                // Rendah
                if (data1.nilai.hasOwnProperty('Rendah')) {
                    jumlah1.push(data1.nilai['Rendah'])
                } else {
                    jumlah1.push(0)
                }

                // Sedang
                if (data1.nilai.hasOwnProperty('Sedang')) {
                    jumlah1.push(data1.nilai['Sedang'])
                } else {
                    jumlah1.push(0)
                }

                // Tinggi
                if (data1.nilai.hasOwnProperty('Tinggi')) {
                    jumlah1.push(data1.nilai['Tinggi'])
                } else {
                    jumlah1.push(0)
                }

                // Sangat Tinggi
                if (data1.nilai.hasOwnProperty('Sangat Tinggi')) {
                    jumlah1.push(data1.nilai['Sangat Tinggi'])
                } else {
                    jumlah1.push(0)
                }

                // Dataset 2
                // ------------------------------------------

                // Sangat Rendah
                if (data2.nilai.hasOwnProperty('Sangat Rendah')) {
                    jumlah2.push(data2.nilai['Sangat Rendah'])
                } else {
                    jumlah2.push(0)
                }

                // Rendah
                if (data2.nilai.hasOwnProperty('Rendah')) {
                    jumlah2.push(data2.nilai['Rendah'])
                } else {
                    jumlah2.push(0)
                }

                // Sedang
                if (data2.nilai.hasOwnProperty('Sedang')) {
                    jumlah2.push(data2.nilai['Sedang'])
                } else {
                    jumlah2.push(0)
                }

                // Tinggi
                if (data2.nilai.hasOwnProperty('Tinggi')) {
                    jumlah2.push(data2.nilai['Tinggi'])
                } else {
                    jumlah2.push(0)
                }

                // Sangat Tinggi
                if (data2.nilai.hasOwnProperty('Sangat Tinggi')) {
                    jumlah2.push(data2.nilai['Sangat Tinggi'])
                } else {
                    jumlah2.push(0)
                }
                console.log(jumlah1)
                console.log(jumlah2)

                // Line Chart
                // ------------------------------------------

                //Get the context of the Chart canvas element we want to select
                var lineChartctx = $("#pekerjaan-chart-comparison");

                // Chart Options
                var linechartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'top',
                },
                hover: {
                    mode: 'label'
                },
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
                    }
                    }]
                },
                };

                // Chart Data
                var linechartData = {
                labels: labels,
                datasets: [{
                    data: jumlah1,
                    label: label1,
                    borderColor: primary,
                    fill: false
                }, {
                    data: jumlah2,
                    label: label2,
                    borderColor: success,
                    fill: false
                }]
                };

                var lineChartconfig = {
                type: 'line',

                // Chart Options
                options: linechartOptions,

                data: linechartData
                };

                // Create the chart
                var lineChart = new Chart(lineChartctx, lineChartconfig);
    
                //     // Bar Chart
                //     // ------------------------------------------
    
                //     //Get the context of the Chart canvas element we want to select
                //     var barChartctx = $("#pekerjaan-chart-"+i);
    
                //     // Chart Options
                //     var barchartOptions = {
                //         // Elements options apply to all of the options unless overridden in a dataset
                //         // In this case, we are setting the border of each bar to be 2px wide
                //         elements: {
                //             rectangle: {
                //             borderWidth: 2,
                //             borderSkipped: 'left'
                //             }
                //         },
                //         responsive: true,
                //         maintainAspectRatio: false,
                //         responsiveAnimationDuration: 500,
                //         legend: { display: false },
                //         scales: {
                //             xAxes: [{
                //             display: true,
                //             gridLines: {
                //                 color: grid_line_color,
                //             },
                //             scaleLabel: {
                //                 display: true,
                //             }
                //             }],
                //             yAxes: [{
                //             display: true,
                //             gridLines: {
                //                 color: grid_line_color,
                //             },
                //             scaleLabel: {
                //                 display: true,
                //             },
                //             ticks: {
                //                 stepSize: 1000
                //             },
                //             }],
                //         }
    
                //     };
    
                //     // Chart Data
                //     var barchartData = {
                //     labels: labels,
                //     datasets: [{
                //         label: "Responden",
                //         data: jumlah,
                //         backgroundColor: themeColors,
                //         borderColor: "transparent"
                //     }]
                //     };
    
                //     var barChartconfig = {
                //     type: 'bar',
    
                //     // Chart Options
                //     options: barchartOptions,
    
                //     data: barchartData
                //     };
    
                //     // Create the chart
                //     var barChart = new Chart(barChartctx, barChartconfig);
            }

            chart()

        });
    </script> --}}
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
                const response = await fetch('http://localhost:8000/api/pekerjaan')
                const data = await response.json()
                let i = 0
                // console.log(data)

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
                    // console.log(jumlah)
    
                    // Bar Chart
                    // ------------------------------------------
    
                    //Get the context of the Chart canvas element we want to select
                    var barChartctx = $("#pekerjaan-chart-"+i);
    
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
                        label: "Nilai rata-rata responden",
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