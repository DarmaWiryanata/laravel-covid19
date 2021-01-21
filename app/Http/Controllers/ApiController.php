<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function jk($index)
    {
        $response = Http::get('http://survei.kataback.com/api/jenis_kelamin');
        $data = $response->json();
        
        $pekerjaan = $data['total'][$index]['jenis_kelamin'];
        $respond['label'] = $pekerjaan;
        $respond['nilai'] = [];
        $respond['aplikasi'] = [];
        for ($i=0; $i < count($data['total'][$index]['responden']); $i++) { 
            $respond['nilai'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['jumlah']];
            $respond['aplikasi'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['aplikasi']];
        }

        return $respond;
    }

    static function jks()
    {
        $response = Http::get('http://survei.kataback.com/api/jenis_kelamin');
        $data = $response->json();
        
        foreach ($data['total'] as $key => $value) {
            $jenisKelamin = $value['jenis_kelamin'];
            $respond[$key]['label'] = $jenisKelamin;
            $respond[$key]['nilai'] = [];
            $respond[$key]['aplikasi'] = [];
            for ($i=0; $i < count($value['responden']); $i++) { 
                $respond[$key]['nilai'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['jumlah']];
                $respond[$key]['aplikasi'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['aplikasi']];
            }
        }

        return $respond;
    }
    
    public function pekerjaan($index)
    {
        $response = Http::get('http://survei.kataback.com/api/pekerjaan');
        $data = $response->json();
        
        $pekerjaan = $data['total'][$index]['pekerjaan'];
        $respond['label'] = $pekerjaan;
        $respond['nilai'] = [];
        $respond['aplikasi'] = [];
        for ($i=0; $i < count($data['total'][$index]['responden']); $i++) { 
            $respond['nilai'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['jumlah']];
            $respond['aplikasi'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['aplikasi']];
        }

        return $respond;
    }
    
    static function pekerjaans()
    {
        $response = Http::get('http://survei.kataback.com/api/pekerjaan');
        $data = $response->json();
        
        foreach ($data['total'] as $key => $value) {
            $pekerjaan = $value['pekerjaan'];
            $respond[$key]['label'] = $pekerjaan;
            $respond[$key]['nilai'] = [];
            $respond[$key]['aplikasi'] = [];
            for ($i=0; $i < count($value['responden']); $i++) { 
                $respond[$key]['nilai'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['jumlah']];
                $respond[$key]['aplikasi'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['aplikasi']];
            }
        }

        return $respond;
    }
    
    public function pendidikan($index)
    {
        $response = Http::get('http://survei.kataback.com/api/pendidikan_terakhir');
        $data = $response->json();
        
        $pendidikan = $data['total'][$index]['pendidikan_terakhir'];
        $respond['label'] = $pendidikan;
        $respond['nilai'] = [];
        $respond['aplikasi'] = [];
        for ($i=0; $i < count($data['total'][$index]['responden']); $i++) { 
            $respond['nilai'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['jumlah']];
            $respond['aplikasi'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['aplikasi']];
        }

        return $respond;
    }
    
    static function pendidikans()
    {
        $response = Http::get('http://survei.kataback.com/api/pendidikan_terakhir');
        $data = $response->json();
        
        foreach ($data['total'] as $key => $value) {
            $pendidikan = $value['pendidikan_terakhir'];
            $respond[$key]['label'] = $pendidikan;
            $respond[$key]['nilai'] = [];
            $respond[$key]['aplikasi'] = [];
            for ($i=0; $i < count($value['responden']); $i++) { 
                $respond[$key]['nilai'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['jumlah']];
                $respond[$key]['aplikasi'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['aplikasi']];
            }
        }

        return $respond;
    }
    
    public function tahun($index)
    {
        $response = Http::get('http://survei.kataback.com/api/tahun_lahir');
        $data = $response->json();
        
        $tahun = $data['total'][$index]['tahun_lahir'];
        $respond['label'] = $tahun;
        $respond['nilai'] = [];
        $respond['aplikasi'] = [];
        for ($i=0; $i < count($data['total'][$index]['responden']); $i++) { 
            $respond['nilai'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['jumlah']];
            $respond['aplikasi'] += [$data['total'][$index]['responden'][$i]['level'] => $data['total'][$index]['responden'][$i]['aplikasi']];
        }

        return $respond;
    }
    
    static function tahuns()
    {
        $response = Http::get('http://survei.kataback.com/api/tahun_lahir');
        $data = $response->json();
        
        foreach ($data['total'] as $key => $value) {
            $tahun = $value['tahun_lahir'];
            $respond[$key]['label'] = $tahun;
            $respond[$key]['nilai'] = [];
            $respond[$key]['aplikasi'] = [];
            for ($i=0; $i < count($value['responden']); $i++) { 
                $respond[$key]['nilai'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['jumlah']];
                $respond[$key]['aplikasi'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['aplikasi']];
            }
        }

        return $respond;
    }

    static function wilayah(Request $request)
    {
        if (isset($request->kabkota)) {
            $response = Http::get('http://survei.kataback.com/api/wilayah?provinsi='.$request->provinsi.'&kabkota='.$request->kabkota);
            $data = $response->json();
            
            foreach ($data['data'] as $key => $value) {
                $respond[$key]['daerah'] = $data['daerah'];
                $respond[$key]['daerah_latitude'] = $data['latitude'];
                $respond[$key]['daerah_longitude'] = $data['longitude'];
                $respond[$key]['label'] = $value['kecamatan'];
                $respond[$key]['latitude'] = $value['kecamatan_latitude'];
                $respond[$key]['longitude'] = $value['kecamatan_longitude'];
                $respond[$key]['nilai'] = [];
                $respond[$key]['aplikasi'] = [];
                for ($i=0; $i < count($value['responden']); $i++) { 
                    $respond[$key]['nilai'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['jumlah']];
                    $respond[$key]['aplikasi'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['aplikasi']];
                }
            }
    
            return $respond;

        } else if (isset($request->provinsi)) {
            $response = Http::get('http://survei.kataback.com/api/wilayah?provinsi='.$request->provinsi);
            $data = $response->json();
            
            foreach ($data['data'] as $key => $value) {
                $respond[$key]['daerah'] = $data['daerah'];
                $respond[$key]['daerah_latitude'] = $data['latitude'];
                $respond[$key]['daerah_longitude'] = $data['longitude'];
                $respond[$key]['label'] = $value['kabkota'];
                $respond[$key]['latitude'] = $value['kabkota_latitude'];
                $respond[$key]['longitude'] = $value['kabkota_longitude'];
                $respond[$key]['nilai'] = [];
                $respond[$key]['aplikasi'] = [];
                for ($i=0; $i < count($value['responden']); $i++) { 
                    $respond[$key]['nilai'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['jumlah']];
                    $respond[$key]['aplikasi'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['aplikasi']];
                }
            }
    
            return $respond;

        } else {
            $response = Http::get('http://survei.kataback.com/api/wilayah');
            return $data = $response->json();
            
            foreach ($data['data'] as $key => $value) {
                $respond[$key]['label'] = $value['provinsi'];
                $respond[$key]['latitude'] = $value['provinsi_latitude'];
                $respond[$key]['longitude'] = $value['provinsi_longitude'];
                $respond[$key]['nilai'] = [];
                $respond[$key]['aplikasi'] = [];
                for ($i=0; $i < count($value['responden']); $i++) { 
                    $respond[$key]['nilai'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['jumlah']];
                    $respond[$key]['aplikasi'] += [$value['responden'][$i]['level'] => $value['responden'][$i]['aplikasi']];
                }
            }
    
            return $respond;
            
        }
    }
}
