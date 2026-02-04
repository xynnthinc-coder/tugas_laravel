<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        $gurus = Guru::all();

        for($i = 0; $i < 50; $i++) {
            $guru = $gurus->random();

            Siswa::create([
                'nama' => $faker->name,
                'kelas' => 'Kelas ' . $faker->numberBetween(10, 12) . ' ' . $faker->randomElement(['A', 'B', 'C', 'D']),
                'guru_id' => $guru->id,
            ]);
        }
    }
}
