<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234567'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'mahas1',
            'email' => 'mahas@gmail.com',
            'password' => bcrypt('mahas1234567'),
            'role' => 'mahasiswa',
        ]);

        Fakultas::create([
           'name' => 'FT',
           'foto' => 'img/FTEKNIK.jpg',
        ]);

        Fakultas::create([
           'name' => 'FEB',
           'foto' => 'img/FBISNIS.jpg',
        ]);

        Fakultas::create([
           'name' => 'FISIP',
           'foto' => 'img/FILMUSOSIAL.jpg',
        ]);

        Fakultas::create([
           'name' => 'FKIP',
           'foto' => 'img/FKEGURUAN.jpg', 
        ]);

        Prodi::create([
            'fakultas_id' => 1,
            'name' => 'Teknik Informatika',
            'harga' => 350000,
            'foto' => 'img/teknik1.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 1,
            'name' => 'Teknik Sipil',
            'harga' => 350000,
            'foto' => 'img/teknik2.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 1,
            'name' => 'Teknik Elektro',
            'harga' => 350000,
            'foto' => 'img/teknik3.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 2,
            'name' => 'Manajemen',
            'harga' => 350000,
            'foto' => 'img/bisnis1.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 2,
            'name' => 'Akuntasi',
            'harga' => 350000,
            'foto' => 'img/bisnis2.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 2,
            'name' => 'Ekonomi Pembangunan',
            'harga' => 350000,
            'foto' => 'img/bisnis3.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 3,
            'name' => 'Ilmu Komunikasi',
            'harga' => 350000,
            'foto' => 'img/sosial1.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 3,
            'name' => 'Ilmu Administrasi Negara',
            'harga' => 350000,
            'foto' => 'img/sosial2.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 3,
            'name' => 'Sosiologi',
            'harga' => 350000,
            'foto' => 'img/sosial3.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 4,
            'name' => 'Pendidikan Matematika',
            'harga' => 350000,
            'foto' => 'img/pendi1.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 4,
            'name' => 'Pendidikan Bahasa Inggris',
            'harga' => 350000,
            'foto' => 'img/pendi2.jpg',
        ]);

        Prodi::create([
            'fakultas_id' => 4,
            'name' => 'Pendidikan Biologi',
            'harga' => 350000,
            'foto' => 'img/pendi3.jpg',
        ]);
    }
}
