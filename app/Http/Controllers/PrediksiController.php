<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarSpec; 

class PrediksiController extends Controller
{
    public function index()
    {
        // 1. Ambil data dari Database
        $dataDB = CarSpec::orderBy('model_name', 'asc')->get();

        $specs = [];
        
        foreach($dataDB as $item) {
            $specs[$item->model_name] = [
                "trans" => $item->transmisi_options,
                "fuel"  => $item->fuel_options,
                
                // <--- INI DIA YANG KETINGGALAN KEMARIN!
                // Kita harus kirim URL gambar ke JavaScript.
                // Jika ada gambar, kita buat link lengkapnya (asset...). Jika tidak, kita kirim null.
                "image" => $item->image ? asset('storage/' . $item->image) : null 
            ];
        }

        return view('prediksi.index', compact('specs'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'model_mobil' => 'required',
            'tahun'       => 'required|numeric|min:1990|max:2025',
            'km'          => 'required|numeric|min:0',
            'transmisi'   => 'required',
            'bensin'      => 'required',
        ]);

        $transmisi_final = $request->transmisi;

        if ($transmisi_final == 'CVT') {
            $transmisi_final = 'Automatic';
        }

        $pythonPath = "python"; 
        $scriptPath = storage_path('app/python/predict.py');

        $p1 = escapeshellarg($request->model_mobil);
        $p2 = escapeshellarg($request->tahun);
        $p3 = escapeshellarg($request->km);
        $p4 = escapeshellarg($transmisi_final);
        $p5 = escapeshellarg($request->bensin);

        $command = "{$pythonPath} \"{$scriptPath}\" {$p1} {$p2} {$p3} {$p4} {$p5}";
        
        $output = shell_exec($command);
        $result = json_decode($output, true);

        if ($result && isset($result['status']) && $result['status'] == 'success') {
            $hargaRupiah = "Rp " . number_format($result['harga'], 0, ',', '.');
            return back()->with('success', $hargaRupiah)->withInput(); 
        } else {
            $msg = $result['pesan'] ?? 'Gagal memproses prediksi.';
            return back()->with('error', $msg)->withInput();
        }
    }
}