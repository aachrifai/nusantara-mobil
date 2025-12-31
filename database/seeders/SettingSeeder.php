<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run() {
    Setting::create(['key' => 'hero_title', 'value' => 'Temukan Mobil Impianmu']);
    Setting::create(['key' => 'hero_subtitle', 'value' => 'Nusantara Mobil menyediakan unit terbaik.']);
    Setting::create(['key' => 'hero_image', 'value' => null]); // Nanti diisi upload
}
}
