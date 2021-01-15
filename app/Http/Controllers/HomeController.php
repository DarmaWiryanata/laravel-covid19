<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        // Summary
        $response = Http::get('http://localhost:8001/api/jenis_kelamin');
        $data = $response->json();

        $male = 0;
        $female = 0;
        $total = 0;

        foreach ($data['total'][0]['responden'] as $key => $value) {
            $male += $value['jumlah'];
            $total += $value['jumlah'];
        }
        
        foreach ($data['total'][1]['responden'] as $key => $value) {
            $female += $value['jumlah'];
            $total += $value['jumlah'];
        }

        // Dropdown items
        $jk = ApiController::jks();
        $pekerjaan = ApiController::pekerjaans();
        $pendidikan = ApiController::pendidikans();
        $tahun = ApiController::tahuns();
        
        return view('index', compact('male', 'female', 'jk', 'pekerjaan', 'pendidikan', 'tahun', 'total'));
    }

    public function jk()
    {
        $response = Http::get('http://localhost:8001/api/jenis_kelamin');
        $data = $response->json();

        return view('jk', compact('data'));
    }
    
    public function pekerjaan()
    {
        $response = Http::get('http://localhost:8001/api/pekerjaan');
        $data = $response->json();

        return view('pekerjaan', compact('data'));
    }
    
    public function pendidikan()
    {
        $response = Http::get('http://localhost:8001/api/pendidikan_terakhir');
        $data = $response->json();

        return view('pendidikan', compact('data'));
    }
    
    public function tahun()
    {
        $response = Http::get('http://localhost:8001/api/tahun_lahir');
        $data = $response->json();

        return view('tahun', compact('data'));
    }

    public function wilayah()
    {
        $response = Http::get('http://localhost:8001/api/wilayah');
        $data = $response->json();

        return view('wilayah', compact('data'));
    }
}
