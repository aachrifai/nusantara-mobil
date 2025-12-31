<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Listing;

class ListingSeeder extends Seeder
{
    public function run()
    {
        Listing::create([
            'title' => 'Toyota Avanza Veloz 1.5',
            'brand' => 'Toyota',
            'price' => 215000000,
            'year' => 2020,
            'description' => 'Kondisi mulus, pajak hidup, siap pakai luar kota.',
            'image' => null, // Nanti bisa diupload lewat admin
        ]);

        Listing::create([
            'title' => 'Toyota Fortuner VRZ TRD',
            'brand' => 'Toyota',
            'price' => 485000000,
            'year' => 2019,
            'description' => 'Diesel, Tangan pertama, service record Auto2000.',
            'image' => null,
        ]);
    }
}