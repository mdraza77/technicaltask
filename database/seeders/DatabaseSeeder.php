<?php

// namespace Database\Seeders;

// use App\Models\User;
// // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         // User::factory(10)->create();

//         User::factory()->create([
//             'name' => 'Md Raza',
//             'email' => 'mdraza8297@gmail.com',
//         ]);

//         $this->call([
//             MaterialSeeder::class,
//         ]);
//     }
// }
namespace Database\Seeders;

use App\Models\User;
use App\Models\Facility;
use App\Models\Material;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MaterialSeeder::class,
        ]);

        $mainUser = User::factory()->create([
            'name' => 'Md Raza',
            'email' => 'mdraza8297@gmail.com',
        ]);

        $otherUsers = User::factory(29)->create();

        $allUsers = $otherUsers->push($mainUser);

        $materials = Material::all();

        if ($materials->isEmpty()) {
            $this->command->info('No materials found. Please run MaterialSeeder first.');
            return;
        }

        Facility::factory(50)->make()->each(function ($facility) use ($allUsers, $materials) {
            $facility->user_id = $allUsers->random()->id;
            $facility->save();

            $facility->materials()->attach(
                $materials->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        $this->command->info('Creating 10 facilities for User ID 1...');
        Facility::factory(50)->make()->each(function ($facility) use ($materials) {
            $facility->user_id = 1;
            $facility->save();

            $facility->materials()->attach(
                $materials->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
