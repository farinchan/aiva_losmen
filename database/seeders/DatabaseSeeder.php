<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Tipe;
use App\Models\Ulasan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::create(['name' => 'admin super']);
        Role::create(['name' => 'admin hotel']);
        Role::create(['name' => 'admin pegawai']);
        Role::create(['name' => 'pelanggan']);
        Role::create(['name' => 'pegawai']);

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

        $user = User::factory(10)->create();
        $user->each(function ($user) {
            $user->assignRole('pelanggan');
            $user->save();
        });

        Pelanggan::factory(10)->create();

        Ulasan::factory(30)->create()->each(function ($ulasan) {
            $ulasan->komentar = 'ini adalah komentar palsu yang di-generate oleh factory, ini komentar dengan ID-' . $ulasan->id . ' dari user ' . $ulasan->user_id . ' untuk kamar ' . $ulasan->kamar_id . ' dengan rating ' . $ulasan->rating . ' bintang.';
            $ulasan->save();
        });

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('pegawai');
            $user->save();
        });

        Pegawai::factory(10)->create();

        User::create([
            'username' => 'fajri_chan',
            'email' => 'fajri@gariskode.com',
            'password' => bcrypt('password'),
        ])->assignRole(['pegawai', 'admin super']);

        Pegawai::create([
            'nama' => 'Fajri Rinaldi Chan',
            'jenis_kelamin' => 'L',
            'no_telp' => '089613390766',
            'jabatan' => 'Managers',
            'alamat' => 'Medan, Sumatera Utara',
            'tanggal_lahir' => '2002-04-06',
            'user_id' => 21,
        ]);

        User::create([
            'username' => 'admin_hotel',
            'email' => 'adminhotel@gariskode.me',
            'password' => bcrypt('password'),
        ])->assignRole(['pegawai', 'admin hotel']);

        Pegawai::create([
            'nama' => 'Admin Hotel',
            'jenis_kelamin' => 'L',
            'no_telp' => '089613390766',
            'jabatan' => 'Admin Hotel',
            'alamat' => 'Aceh, Indonesia',
            'tanggal_lahir' => '2000-01-01',
            'user_id' => 22,
        ]);

        User::create([
            'username' => 'admin_pegawai',
            'email' => 'adminpegawai@gariskode.me',
            'password' => bcrypt('password'),
        ])->assignRole(['pegawai', 'admin pegawai']);

        Pegawai::create([
            'nama' => 'Admin Pegawai',
            'jenis_kelamin' => 'P',
            'no_telp' => '089613390766',
            'jabatan' => 'Admin Pegawai',
            'alamat' => 'Jakarta, Indonesia',
            'tanggal_lahir' => '2000-01-01',
            'user_id' => 23,
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
