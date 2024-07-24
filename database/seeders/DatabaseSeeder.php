<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\Tipe;
use App\Models\Ulasan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Tipe::create([
            'nama' => 'Single Room',
            'deskripsi' => 'Single Room adalah kamar dengan satu tempat tidur ukuran single, cocok untuk satu orang.',
        ]);

        Tipe::create([
            'nama' => 'Double Room',
            'deskripsi' => 'Double Room adalah kamar dengan dua tempat tidur ukuran single, cocok untuk dua orang.',
        ]);

        Tipe::create([
            'nama' => 'Family Room',
            'deskripsi' => 'Family Room adalah kamar dengan tiga tempat tidur ukuran single, cocok untuk tiga orang.',
        ]);

        Tipe::create([
            'nama' => 'Suite Room',
            'deskripsi' => 'Suite Room adalah kamar dengan satu tempat tidur ukuran double, cocok untuk dua orang.',
        ]);

        Kamar::factory(10)->create()->each(function ($kamar) {
            $kamar->nomor_kamar = str_pad($kamar->id, 3, '0', STR_PAD_LEFT);
            $kamar->save();
        });  

        User::factory(10)->create();

        Ulasan::factory(30)->create()->each(function ($ulasan) {
            $ulasan->komentar = 'ini adalah komentar palsu yang di-generate oleh factory, ini komentar dengan ID-' . $ulasan->id . ' dari user ' . $ulasan->user_id . ' untuk kamar ' . $ulasan->kamar_id . ' dengan rating ' . $ulasan->rating . ' bintang.';
            $ulasan->save();
        });

        User::create([
            'name' => 'Fajri',
            'email' => 'fajri@gariskode.com',
            'jenis_kelamin' => 'L',
            'no_telp' => "089613390766",
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Owner Aiva Losmen',
            'email' => 'owner@gariskode.com',
            'jenis_kelamin' => 'L',
            'no_telp' => "081234567890",
            'role' => 'owner',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        Fasilitas::create([
            'nama' => 'Wi-fi',
            'detail' => 'Wi-fi gratis yang tersedia di kamar dan area umum.',
            'icon' => 'wifi.png',
        ]);

        Fasilitas::create([
            'nama' => 'Sarapan Pagi',
            'detail' => 'Sarapan pagi gratis untuk tamu hotel.',
            'icon' => 'breakfast.png',
        ]);

        Fasilitas::create([
            'nama' => 'AC',
            'detail' => 'AC yang dingin dan nyaman.',
            'icon' => 'ac.png',
        ]);

        Fasilitas::create([
            'nama' => 'TV',
            'detail' => 'TV dengan channel kabel.',
            'icon' => 'tv.png',
        ]);

        Fasilitas::create([
            'nama' => 'Coffee Maker',
            'detail' => 'Coffee maker dengan kopi dan teh gratis.',
            'icon' => 'coffee.png',
        ]);

        Fasilitas::create([
            'nama' => 'Room Service',
            'detail' => 'Room service 24 jam.',
            'icon' => 'roomservice.png',
        ]);

        Fasilitas::create([
            'nama' => 'Air Panas',
            'detail' => 'Air panas untuk mandi.',
            'icon' => 'hotwater.png',
        ]);

        Fasilitas::create([
            'nama' => 'Parkir Gratis',
            'detail' => 'Parkir gratis untuk tamu hotel.',
            'icon' => 'parking.png',
        ]);

        Fasilitas::create([
            'nama' => 'Keamanan',
            'detail' => 'Keamanan 24 jam.',
            'icon' => 'security.png',
        ]);

        Fasilitas::create([
            'nama' => 'CCTV',
            'detail' => 'CCTV di area publik.',
            'icon' => 'cctv.png',
        ]);


        For ($i = 1; $i <= 10; $i++) {
            FasilitasKamar::create([
                'kamar_id' => $i,
                'fasilitas_id' => rand(1, 2),
            ]);
        }

        For ($i = 1; $i <= 10; $i++) {
            FasilitasKamar::create([
                'kamar_id' => $i,
                'fasilitas_id' => rand(3, 4),
            ]);
        }

        
    }
}
