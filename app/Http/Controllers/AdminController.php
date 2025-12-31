<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarSpec; // Model Data AI
use App\Models\Listing; // Model Stok Mobil (Wajib ada untuk Dashboard Statistik)
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // 1. HALAMAN UTAMA (DASHBOARD & STATISTIK)
    public function index()
    {
        // A. Ambil Data Statistik untuk Kartu Atas
        $stats = [
            'total_mobil'    => Listing::count(),
            'total_tersedia' => Listing::where('status', 'Tersedia')->count(),
            'total_terjual'  => Listing::where('status', 'Terjual')->count(),
            // Hitung total harga hanya dari mobil yang statusnya 'Tersedia'
            'total_aset'     => Listing::where('status', 'Tersedia')->sum('price'),
        ];

        // B. Ambil Data AI (Daftar mobil untuk prediksi)
        $cars = CarSpec::orderBy('model_name', 'asc')->get();

        // Kirim $cars dan $stats ke View
        return view('admin.index', compact('cars', 'stats'));
    }

    // 2. HALAMAN TAMBAH DATA (FORM)
    public function create()
    {
        return view('admin.create');
    }

    // 3. PROSES SIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'model_name' => 'required|unique:car_specs,model_name',
            'transmisi'  => 'required', // Input string dipisah koma
            'bensin'     => 'required', // Input string dipisah koma
            'image'      => 'nullable|image|max:2048'
        ]);

        // Proses Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        }

        // Konversi string "Manual, Auto" menjadi Array ["Manual", "Auto"]
        $transArray = array_map('trim', explode(',', $request->transmisi));
        $fuelArray  = array_map('trim', explode(',', $request->bensin));

        CarSpec::create([
            'model_name' => $request->model_name,
            'transmisi_options' => $transArray,
            'fuel_options' => $fuelArray,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.index')->with('success', 'Data AI Mobil Berhasil Ditambahkan!');
    }

    // 4. HALAMAN EDIT DATA (FORM)
    public function edit($id)
    {
        $car = CarSpec::findOrFail($id);
        
        // Kita gabungkan array jadi string koma lagi agar mudah diedit di text input
        // Contoh: ["Manual", "Auto"] -> "Manual, Auto"
        $transString = implode(', ', $car->transmisi_options ?? []);
        $fuelString  = implode(', ', $car->fuel_options ?? []);

        return view('admin.edit', compact('car', 'transString', 'fuelString'));
    }

    // 5. PROSES UPDATE DATA
    public function update(Request $request, $id)
    {
        $car = CarSpec::findOrFail($id);

        $request->validate([
            'model_name' => 'required',
            'transmisi'  => 'required',
            'bensin'     => 'required',
            'image'      => 'nullable|image|max:2048'
        ]);

        // Update Gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }
            $car->image = $request->file('image')->store('cars', 'public');
        }

        // Konversi lagi ke Array
        $transArray = array_map('trim', explode(',', $request->transmisi));
        $fuelArray  = array_map('trim', explode(',', $request->bensin));

        $car->update([
            'model_name' => $request->model_name,
            'transmisi_options' => $transArray,
            'fuel_options' => $fuelArray,
            // Jika tidak ada gambar baru, biarkan image lama
        ]);

        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui!');
    }

    // 6. PROSES HAPUS DATA
    public function destroy($id)
    {
        $car = CarSpec::findOrFail($id);
        
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }
        
        $car->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}