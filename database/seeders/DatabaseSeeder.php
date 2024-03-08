<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\Role;
use App\Models\User;
use App\Models\Pendaftar;
use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'      => 'SMKN 5 Kab. Tangerang',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'nis'       => '0123456789',
            'role'      => 'Administrator' 
        ]);

        User::create([
            'name'      => 'Mujiyono',
            'email'     => 'mujiyono@gmail.com',
            'password'  => bcrypt('1234'),
            'nis'       => '01234567810',
            'role'      => 'Alumni'
        ]);

    }
}