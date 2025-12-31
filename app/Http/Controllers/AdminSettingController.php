<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function index() {
        // Ambil semua setting jadikan array (Key => Value)
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // 1. Simpan Judul & Subjudul
        Setting::updateOrCreate(['key' => 'hero_title'], ['value' => $request->hero_title]);
        Setting::updateOrCreate(['key' => 'hero_subtitle'], ['value' => $request->hero_subtitle]);
        
        // 2. Simpan Statistik (BARU DITAMBAHKAN)
        // Ini akan menyimpan input dari form "Unit Terjual" & "Kepuasan"
        Setting::updateOrCreate(['key' => 'units_sold'], ['value' => $request->units_sold]);
        Setting::updateOrCreate(['key' => 'customer_satisfaction'], ['value' => $request->customer_satisfaction]);

        // 3. Simpan Google Maps
        if ($request->has('company_map')) {
            Setting::updateOrCreate(['key' => 'company_map'], ['value' => $request->company_map]);
        }

        // 4. Simpan Kontak Perusahaan
        Setting::updateOrCreate(['key' => 'company_address'], ['value' => $request->company_address]);
        Setting::updateOrCreate(['key' => 'company_hours'], ['value' => $request->company_hours]);
        Setting::updateOrCreate(['key' => 'company_phone'], ['value' => $request->company_phone]);

        // 5. Simpan Gambar (Jika ada upload baru)
        if ($request->hasFile('hero_image')) {
            // Hapus gambar lama agar storage tidak penuh
            $oldImage = Setting::where('key', 'hero_image')->value('value');
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            
            // Upload gambar baru
            $path = $request->file('hero_image')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'hero_image'], ['value' => $path]);
        }

        return back()->with('success', 'Pengaturan website berhasil disimpan!');
    }
}