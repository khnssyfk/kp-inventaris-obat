<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Pasien;
use App\Models\BentukObat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Pasien::factory(3)->create();
        // Post::factory(20) ->create();

        Role::create([
            'rolename' => 'Super Admin',
            'keterangan' => 'Super Admin'
        ]);
        Role::create([
            'rolename' => 'Admin Klinik',
            'keterangan' => 'Admin Klinik'
        ]);
        Role::create([
            'rolename' => 'Pasien',
            'keterangan' => 'Pasien'
        ]);
        Role::create([
            'rolename' => 'Dokter/Lab',
            'keterangan' => 'Dokter/Lab'
        ]);
        Role::create([
            'rolename' => 'Farmasi',
            'keterangan' => 'Farmasi'
        ]);
        User::create([
            'nama'=>'khansa',
            'no_hp'=>'082251920006',
            'email'=>'ksyafika@gmail.com',
            'role_id'=>1,
            'password'=> bcrypt('1234')
        ]);
        User::create([
            'nama'=>'dr. Agil Wahyu Pangestuputra',
            'no_hp'=>'0888',
            'email'=>'agil@gmail.com',
            'role_id'=>4,
            'password'=> bcrypt('12345')
        ]);
        User::create([
            'nama'=>'Anakin Skywalker',
            'no_hp'=>'0889',
            'email'=>'anakin@gmail.com',
            'role_id'=>5,
            'password'=> bcrypt('12345')
        ]);
        Pasien::create([
            'nama'=>'Khansa Syafika',
            'no_rekam_medis'=>'RM2411020001',
            'nik'=>576556767,
            'jenis_kelamin'=> 'perempuan',
            'agama'=> 'islam',
            'pekerjaan'=> 'pelajar/mahasiswa',
            'alamat'=> 'jln.cornelia street',
            'email'=>'ksyafika@gmail.com',
            'no_hp'=>'098766',
            'role_id'=>3
        ]);
        Pasien::create([
            'nama'=>'dr. Prihan Fakhri',
            'no_rekam_medis'=>'RM010000001',    
            'role_id'=>4
        ]);
        
        
    }
}
