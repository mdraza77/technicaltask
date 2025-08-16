<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create(['name' => 'Paper']);
        Material::create(['name' => 'Plastic']);
        Material::create(['name' => 'Glass']);
        Material::create(['name' => 'Organic Waste']);
        Material::create(['name' => 'Metal']);
        Material::create(['name' => 'Electronics']);
        Material::create(['name' => 'Textiles']);
        Material::create(['name' => 'Batteries']);
    }
}
