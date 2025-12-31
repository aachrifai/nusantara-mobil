<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarSpec;

class CarSpecSeeder extends Seeder
{
    public function run()
    {
        // INI ADALAH DATA "KEMARIN" YANG KITA SIMPAN AGAR MASUK KE DATABASE
        $specs = [
            "GT86"          => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol"]],
            "Corolla"       => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol"]],
            "Yaris"         => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol", "Diesel"]],
            "Aygo"          => ["trans" => ["Manual"],                   "fuel" => ["Petrol"]],
            "Innova"        => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol", "Diesel"]],
            "Auris"         => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol", "Diesel", "Hybrid"]],
            "Avensis"       => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol", "Diesel"]],
            "Camry"         => ["trans" => ["Automatic"],                "fuel" => ["Petrol", "Hybrid"]],
            "C-HR"          => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol", "Hybrid"]],
            "Hilux"         => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Diesel"]],
            "IQ"            => ["trans" => ["Manual", "CVT"],            "fuel" => ["Petrol"]],
            "LandCruiser"   => ["trans" => ["Automatic"],                "fuel" => ["Petrol", "Diesel"]],
            "Prius"         => ["trans" => ["CVT"],                      "fuel" => ["Hybrid"]],
            "ProaceVerso"   => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Diesel"]],
            "Alphard"       => ["trans" => ["Automatic"],                "fuel" => ["Petrol", "Hybrid"]],
            "Calya"         => ["trans" => ["Manual"],                   "fuel" => ["Petrol"]],
            "Avanza"        => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol"]],
            "Fortuner"      => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Diesel"]],
            "Kijang"        => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol", "Diesel"]],
            "LGX"           => ["trans" => ["Automatic"],                "fuel" => ["Petrol", "Hybrid"]],
            "Raize"         => ["trans" => ["Manual", "CVT"],            "fuel" => ["Petrol"]],
            "RAV4"          => ["trans" => ["Manual", "CVT", "Automatic"], "fuel" => ["Petrol", "Hybrid"]],
            "Rush"          => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol"]],
            "Supra"         => ["trans" => ["Automatic"],                "fuel" => ["Petrol"]],
            "UrbanCruiser"  => ["trans" => ["Manual", "CVT"],            "fuel" => ["Petrol", "Hybrid"]],
            "Veloz"         => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol"]],
            "Verso"         => ["trans" => ["Manual", "Automatic"],      "fuel" => ["Petrol", "Diesel"]],
            "Verso-S"       => ["trans" => ["Manual", "CVT"],            "fuel" => ["Petrol"]],
        ];

        foreach ($specs as $model => $data) {
            CarSpec::create([
                'model_name' => $model,
                'transmisi_options' => $data['trans'],
                'fuel_options' => $data['fuel'],
                'image' => null // Awalnya belum ada gambar
            ]);
        }
    }
}