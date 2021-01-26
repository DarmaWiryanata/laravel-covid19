@extends('layout')

@section('title')
    Dasbor
@endsection

@section('content')
    <!-- Summary -->
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $total }}</h2>
                        <p>Responden</p>
                    </div>
                    <div class="avatar bg-rgba-success p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa fa-users text-success font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $male }}</h2>
                        <p>Laki-laki</p>
                    </div>
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa fa-male text-primary font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $female }}</h2>
                        <p>Perempuan</p>
                    </div>
                    <div class="avatar bg-rgba-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa fa-female text-danger font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Keseluruhan Data --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Keseluruhan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <canvas id="nilai-chart-summary" height="250"></canvas>
                    </div>
                    <div class="col-sm-6">
                        <canvas id="aplikasi-chart-summary" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Perbandingan --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Perbandingan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset class="form-group">
                            <select class="form-control" id="data-1">
                                <optgroup>
                                    <option disabled>Jenis Kelamin</option>
                                    @foreach ($jk as $item)
                                        <option value="http://localhost:8000/api/jenis-kelamin/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup>
                                    <option disabled>Pekerjaan</option>
                                    @foreach ($pekerjaan as $item)
                                        <option value="http://localhost:8000/api/pekerjaan/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup>
                                    <option disabled>Pendidikan Terakhir</option>
                                    @foreach ($pendidikan as $item)
                                        <option value="http://localhost:8000/api/pendidikan-terakhir/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup>
                                    <option disabled>Tahun Lahir</option>
                                    @foreach ($tahun as $item)
                                        <option value="http://localhost:8000/api/tahun-lahir/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset class="form-group">
                            <select class="form-control" id="data-2">
                                <optgroup>
                                    <option disabled>Jenis Kelamin</option>
                                    @foreach ($jk as $item)
                                        <option value="http://localhost:8000/api/jenis-kelamin/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup>
                                    <option disabled>Pekerjaan</option>
                                    @foreach ($pekerjaan as $item)
                                        <option value="http://localhost:8000/api/pekerjaan/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup>
                                    <option disabled>Pendidikan Terakhir</option>
                                    @foreach ($pendidikan as $item)
                                        <option value="http://localhost:8000/api/pendidikan-terakhir/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup>
                                    <option disabled>Tahun Lahir</option>
                                    @foreach ($tahun as $item)
                                        <option value="http://localhost:8000/api/tahun-lahir/{{ $loop->index }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div>
                    <canvas id="pekerjaan-chart-comparison" height="250"></canvas>
                </div>
                <div>
                    <canvas id="aplikasi-chart-comparison" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12"><h2 class="content-header-title float-left mb-2">Visualisasi</h2></div>
        <div class="col-6"><a href="{{ route('jenis-kelamin') }}" class="card btn btn-white block btn-lg waves-effect waves-light"><i class="feather icon-user"></i> Jenis Kelamin</a></div>
        <div class="col-6"><a href="{{ route('pekerjaan') }}" class="card btn btn-white block btn-lg waves-effect waves-light"><i class="feather icon-briefcase"></i> Pekerjaan</a></div>
        <div class="col-6"><a href="{{ route('pendidikan-terakhir') }}" class="card btn btn-white block btn-lg waves-effect waves-light"><i class="feather icon-book"></i> Pendidikan Terakhir</a></div>
        <div class="col-6"><a href="{{ route('tahun-lahir') }}" class="card btn btn-white block btn-lg waves-effect waves-light"><i class="feather icon-calendar"></i> Tahun Lahir</a></div>
        <div class="col"><a href="{{ route('wilayah') }}" class="card btn btn-white block btn-lg waves-effect waves-light"><i class="feather icon-map-pin"></i> Wilayah</a></div>
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

        async function summary() {
            const response1 = await fetch('http://localhost:8000/api/jenis-kelamin/0')
            const response2 = await fetch('http://localhost:8000/api/jenis-kelamin/1')
            const data1 = await response1.json()
            const data2 = await response2.json()

            var labels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi']
            var jumlah = []
            var aplikasi = []

            var label1 = data1.label
            var label2 = data2.label
            var jumlah1 = []
            var jumlah2 = []
            var aplikasi1 = []
            var aplikasi2 = []

            // Dataset 1
            // ------------------------------------------

            // Sangat Rendah
            if (data1.nilai.hasOwnProperty('Sangat Rendah')) {
                jumlah1.push(data1.nilai['Sangat Rendah'])
                aplikasi1.push(data1.aplikasi['Sangat Rendah'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Rendah
            if (data1.nilai.hasOwnProperty('Rendah')) {
                jumlah1.push(data1.nilai['Rendah'])
                aplikasi1.push(data1.aplikasi['Rendah'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Sedang
            if (data1.nilai.hasOwnProperty('Sedang')) {
                jumlah1.push(data1.nilai['Sedang'])
                aplikasi1.push(data1.aplikasi['Sedang'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Tinggi
            if (data1.nilai.hasOwnProperty('Tinggi')) {
                jumlah1.push(data1.nilai['Tinggi'])
                aplikasi1.push(data1.aplikasi['Tinggi'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Sangat Tinggi
            if (data1.nilai.hasOwnProperty('Sangat Tinggi')) {
                jumlah1.push(data1.nilai['Sangat Tinggi'])
                aplikasi1.push(data1.aplikasi['Sangat Tinggi'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Dataset 2
            // ------------------------------------------

            // Sangat Rendah
            if (data2.nilai.hasOwnProperty('Sangat Rendah')) {
                jumlah2.push(data2.nilai['Sangat Rendah'])
                aplikasi2.push(data2.aplikasi['Sangat Rendah'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Rendah
            if (data2.nilai.hasOwnProperty('Rendah')) {
                jumlah2.push(data2.nilai['Rendah'])
                aplikasi2.push(data2.aplikasi['Rendah'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Sedang
            if (data2.nilai.hasOwnProperty('Sedang')) {
                jumlah2.push(data2.nilai['Sedang'])
                aplikasi2.push(data2.aplikasi['Sedang'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Tinggi
            if (data2.nilai.hasOwnProperty('Tinggi')) {
                jumlah2.push(data2.nilai['Tinggi'])
                aplikasi2.push(data2.aplikasi['Tinggi'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Sangat Tinggi
            if (data2.nilai.hasOwnProperty('Sangat Tinggi')) {
                jumlah2.push(data2.nilai['Sangat Tinggi'])
                aplikasi2.push(data2.aplikasi['Sangat Tinggi'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Dataset 1 + Dataset 2
            for (let index = 0; index < 5; index++) {
                a = parseInt(jumlah1[index]) + parseInt(jumlah2[index])
                b = (parseInt(aplikasi1[index]) + parseInt(aplikasi2[index])) / 2
                jumlah.push(a)
                aplikasi.push(b)
            }

            // Bar Chart
            // ------------------------------------------

            //Get the context of the Chart canvas element we want to select
            var barChartctx = $("#nilai-chart-summary");

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
            var barChartctx2 = $("#aplikasi-chart-summary");

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
        }

        async function chart() {
            let id1 = "";
            let id2 = "";
            id1 = document.getElementById("data-1").value;
            id2 = document.getElementById("data-2").value;
            const response1 = await fetch(id1)
            const response2 = await fetch(id2)
            const data1 = await response1.json()
            const data2 = await response2.json()

            console.log(data1.nilai)
            console.log(data1.aplikasi)
            // console.log(data2)

            var labels = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi']
            var label1 = data1.label
            var label2 = data2.label
            var jumlah1 = []
            var jumlah2 = []
            var aplikasi1 = []
            var aplikasi2 = []

            // Dataset 1
            // ------------------------------------------

            // Sangat Rendah
            if (data1.nilai.hasOwnProperty('Sangat Rendah')) {
                jumlah1.push(data1.nilai['Sangat Rendah'])
                aplikasi1.push(data1.aplikasi['Sangat Rendah'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Rendah
            if (data1.nilai.hasOwnProperty('Rendah')) {
                jumlah1.push(data1.nilai['Rendah'])
                aplikasi1.push(data1.aplikasi['Rendah'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Sedang
            if (data1.nilai.hasOwnProperty('Sedang')) {
                jumlah1.push(data1.nilai['Sedang'])
                aplikasi1.push(data1.aplikasi['Sedang'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Tinggi
            if (data1.nilai.hasOwnProperty('Tinggi')) {
                jumlah1.push(data1.nilai['Tinggi'])
                aplikasi1.push(data1.aplikasi['Tinggi'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Sangat Tinggi
            if (data1.nilai.hasOwnProperty('Sangat Tinggi')) {
                jumlah1.push(data1.nilai['Sangat Tinggi'])
                aplikasi1.push(data1.aplikasi['Sangat Tinggi'])
            } else {
                jumlah1.push(0)
                aplikasi1.push(0)
            }

            // Dataset 2
            // ------------------------------------------

            // Sangat Rendah
            if (data2.nilai.hasOwnProperty('Sangat Rendah')) {
                jumlah2.push(data2.nilai['Sangat Rendah'])
                aplikasi2.push(data2.aplikasi['Sangat Rendah'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Rendah
            if (data2.nilai.hasOwnProperty('Rendah')) {
                jumlah2.push(data2.nilai['Rendah'])
                aplikasi2.push(data2.aplikasi['Rendah'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Sedang
            if (data2.nilai.hasOwnProperty('Sedang')) {
                jumlah2.push(data2.nilai['Sedang'])
                aplikasi2.push(data2.aplikasi['Sedang'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Tinggi
            if (data2.nilai.hasOwnProperty('Tinggi')) {
                jumlah2.push(data2.nilai['Tinggi'])
                aplikasi2.push(data2.aplikasi['Tinggi'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }

            // Sangat Tinggi
            if (data2.nilai.hasOwnProperty('Sangat Tinggi')) {
                jumlah2.push(data2.nilai['Sangat Tinggi'])
                aplikasi2.push(data2.aplikasi['Sangat Tinggi'])
            } else {
                jumlah2.push(0)
                aplikasi2.push(0)
            }
            // console.log(jumlah1)
            // console.log(jumlah2)

            // Pengetahuan Chart
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
                title: {
                    display: true,
                    text: 'Pengetahuan'
                }
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

            // Nilai Aplikasi Chart
            // ------------------------------------------

            //Get the context of the Chart canvas element we want to select
            var lineChartctx2 = $("#aplikasi-chart-comparison");

            // Chart Options
            var linechartOptions2 = {
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
                    },
                    ticks: {
                        min: 0,
                        max: 50
                    }
                    }]
                },
                title: {
                    display: true,
                    text: 'Nilai Rata-rata Aplikasi Responden'
                }
            };

            // Chart Data
            var linechartData2 = {
            labels: labels,
            datasets: [{
                data: aplikasi1,
                label: label1,
                borderColor: primary,
                fill: false
            }, {
                data: aplikasi2,
                label: label2,
                borderColor: success,
                fill: false
            }]
            };

            var lineChartconfig2 = {
            type: 'line',

            // Chart Options
            options: linechartOptions2,

            data: linechartData2
            };

            // Create the chart
            var lineChart2 = new Chart(lineChartctx2, lineChartconfig2);
        }

        summary()
        chart()

        $('#data-1').change(function() {
            chart()
        })

        $('#data-2').change(function() {
            chart()
        })
    });
</script>
@endsection