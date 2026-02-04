<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Petugas;
use App\Models\Pinjam;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $siswas = Siswa::all();
        $bukus = Buku::all();
        $petugass = Petugas::all();

        for($i = 0; $i < 20; $i++) {
            $siswa = $siswas->random();
            $buku = $bukus->random();
            $petugas = $petugass->random();

            Pinjam::create([
                'siswa_id' => $siswa->id,
                'buku_id' => $buku->id,
                'petugas_id' => $petugas->id,
                'tanggal_pinjam' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'tanggal_kembali' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'status' => $faker->randomElement(['dipinjam', 'dikembalikan']),
            ]);
        }
    }
}
