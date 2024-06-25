<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name' => 'Pain Relief',
            'description' => 'Medicines used to reduce pain.',
        ]);

        Categories::create([
            'name' => 'Allergy',
            'description' => 'Medicines for treating allergies.',
        ]);

        Categories::create([
            'name' => 'Cold and Flu',
            'description' => 'Medicines to relieve symptoms of cold and flu.',
        ]);

        Categories::create([
            'name' => 'Digestive Health',
            'description' => 'Medicines for digestive health and issues.',
        ]);

        Categories::create([
            'name' => 'Skin Care',
            'description' => 'Medicines and products for skin care.',
        ]);
    }
}
