@extends('layout')

@section('title')
    Wilayah
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
@endsection

@section('content')
    <section id="apexchart">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <fieldset class="form-group">
                                <select class="form-control" id="data-1">
                                    <option disabled>Provinsi</option>
                                    @foreach ($data['data'] as $item)
                                        <option value="http://localhost:8000/api/wilayah?provinsi={{ $item['provinsi'] }}">{{ $item['provinsi'] }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div id="mapid" style="height: 500px"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script>
        $(window).on("load", function () {

            let mymap = L.map('mapid')
            let marker
        
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

            async function getApi() {
                data1 = document.getElementById('data-1').value
                const response = await fetch(data1)
                const data = await response.json()
                console.log(data)

                mymap.setView([data[0].daerah_latitude, data[0].daerah_longitude], 9);

                for (item of data) {
                    function createHtmlAttributes() {
                        var response = "<b>" + item.label + "</b>";
                        response += "</br />(Jumlah responden/nilai aplikasi)</br />";
                            
                        // Sangat Rendah
                        if (item.nilai.hasOwnProperty('Sangat Rendah')) {
                            response += "</br />Sangat Rendah : " + item.nilai['Sangat Rendah'] + "/" + item.aplikasi['Sangat Rendah'];
                        } else {
                            response += "</br />Sangat Rendah : 0/0";
                        }

                        // Rendah
                        if (item.nilai.hasOwnProperty('Rendah')) {
                            response += "</br />Rendah : " + item.nilai['Rendah'] + "/" + item.aplikasi['Rendah'];
                        } else {
                            response += "</br />Rendah : 0/0";
                        }

                        // Sedang
                        if (item.nilai.hasOwnProperty('Sedang')) {
                            response += "</br />Sedang : " + item.nilai['Sedang'] + "/" + item.aplikasi['Sedang'];
                        } else {
                            response += "</br />Sedang : 0/0";
                        }

                        // Tinggi
                        if (item.nilai.hasOwnProperty('Tinggi')) {
                            response += "</br />Tinggi : " + item.nilai['Tinggi'] + "/" + item.aplikasi['Tinggi'];
                        } else {
                            response += "</br />Tinggi : 0/0";
                        }

                        // Sangat Tinggi
                        if (item.nilai.hasOwnProperty('Sangat Tinggi')) {
                            response += "</br />Sangat Tinggi : " + item.nilai['Sangat Tinggi'] + "/" + item.aplikasi['Sangat Tinggi'];
                        } else {
                            response += "</br />Sangat Tinggi : 0/0";
                        }

                        return response;
                    }

                    // if (marker != undefined) {
                        // mymap.removeLayer(marker)
                    // }
                    marker = L.marker([item.latitude, item.longitude]).addTo(mymap)
                        .bindPopup(createHtmlAttributes());
                }
            }
            
            getApi()

            $('#data-1').change(function() {
                mymap.removeLayer(marker)
                getApi()
            })
        });
    </script>
@endsection