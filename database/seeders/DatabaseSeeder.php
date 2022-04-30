<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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

        User::create([
            'nama'=>'khansa',
            'no_hp'=>'082251920006',
            'email'=>'ksyafika@gmail.com',
            'id_role'=>1,
            'password'=> bcrypt('1234')
        ]);
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
    }
}
