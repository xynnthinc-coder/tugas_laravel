<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        
        for($i = 0; $i < 20; $i++) {
            Petugas::create([
                'nip' => $faker->unique()->numerify('##########'),
                'nama_petugas' => $faker->name,
                'no_telp' => $faker->phoneNumber,
            ]);
        }
    }
}