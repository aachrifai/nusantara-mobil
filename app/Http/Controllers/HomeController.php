<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing; 
use App\Models\Setting; 

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Mulai Query
        $query = Listing::query();

        // 2. Filter Keyword
        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        // 3. Filter Merk
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // 4. Filter Harga
        if ($request->filled('price_max')) {
            if ($request->price_max == '500000001') {
                $query->where('price', '>', 500000000);
            } else {
                $query->where('price', '<=', $request->price_max);
            }
        }

        // 5. Eksekusi Query (Urutkan Tersedia dulu)
        $listings = $query->orderByRaw("FIELD(status, 'Tersedia', 'Terjual')")
                          ->latest()
                          ->get();

        // 6. Ambil Setting (Termasuk Hero, Kontak, dan Statistik Baru)
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('home', compact('listings', 'settings'));
    }

    public function show($id)
    {
        $car = Listing::findOrFail($id);
        
        // Rekomendasi mobil lain
        $recommendations = Listing::where('id', '!=', $id)
                                  ->where('status', 'Tersedia')
                                  ->inRandomOrder()
                                  ->limit(3)
                                  ->get();

        // Ambil setting agar navbar/footer tidak error
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('detail', compact('car', 'recommendations', 'settings'));
    }

    public function about()
    {
        // INI SUDAH BENAR:
        // pluck() otomatis mengambil 'units_sold' dan 'customer_satisfaction'
        // yang baru saja kita input di admin.
        $settings = Setting::pluck('value', 'key')->toArray();
        
        return view('about', compact('settings'));
    }
}