<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Container\Attributes\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $penuliss = Penulis::all();
        $penerbits = Penerbit::all();

        for ($i = 1; $i <= 50; $i++) {
            $penulis = $penuliss->random();
            $penerbit =$penerbits->random();

            Buku::create([
                'kode_buku' => 'KB' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'judul_buku' => $faker->sentence(rand(3, 6)),
                'penulis_id' => $penulis->id,
                'penerbit_id' => $penerbit->id,
                'stok' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
