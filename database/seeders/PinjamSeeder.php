<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Petugas;
use App\Models\Pinjam;
use App\Models\PinjamDetail;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

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

        if ($siswas->isEmpty() || $bukus->isEmpty() || $petugass->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            $siswa = $siswas->random();
            $petugas = $petugass->random();

            $status = $faker->randomElement(['dipinjam', 'dipinjam', 'dikembalikan']);
            $tanggalPinjam = $faker->dateTimeBetween('-30 days', '-1 day');
            $tanggalKembali = $status === 'dikembalikan'
                ? $faker->dateTimeBetween($tanggalPinjam, 'now')
                : (clone $tanggalPinjam)->modify('+' . $faker->numberBetween(3, 14) . ' days');

            $jumlahBuku = $faker->numberBetween(1, 3);
            $dipilih = Buku::where('stok', '>', 0)->inRandomOrder()->take($jumlahBuku)->get();

            if ($dipilih->isEmpty()) {
                continue;
            }

            DB::transaction(function () use ($siswa, $petugas, $status, $tanggalPinjam, $tanggalKembali, $dipilih) {
                $pinjam = Pinjam::create([
                    'siswa_id' => $siswa->id,
                    // Kolom buku_id wajib di schema lama, isi dengan buku pertama untuk kompatibilitas.
                    'buku_id' => $dipilih->first()->id,
                    'petugas_id' => $petugas->id,
                    'tanggal_pinjam' => $tanggalPinjam->format('Y-m-d'),
                    'tanggal_kembali' => $tanggalKembali->format('Y-m-d H:i:s'),
                    'status' => $status,
                ]);

                foreach ($dipilih as $buku) {
                    PinjamDetail::create([
                        'pinjam_id' => $pinjam->id,
                        'buku_id' => $buku->id,
                    ]);

                    // Simulasi peminjaman selalu mengurangi stok.
                    $buku->decrement('stok');

                    // Kalau statusnya sudah dikembalikan, stok dikembalikan lagi (net nol).
                    if ($status === 'dikembalikan') {
                        $buku->increment('stok');
                    }
                }
            });
        }
    }
}
