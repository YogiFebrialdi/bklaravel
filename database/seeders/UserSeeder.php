<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(
            [
            'name' => 'Admin',
            'level' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
            ]);
            User::create(
            [
            'name' => 'Guru',
            'level' => 'guru',
            'email' => 'guru@guru.com',
            'password' => bcrypt('guru'),
             'remember_token' => Str::random(60),
             ]);
             User::create(
             [
             'name' => 'Siswa',
             'level' => 'siswa',
             'email' => 'siswa@siswa.com',
             'password' => bcrypt('siswa'),
             'remember_token' => Str::random(60),
             ]);

    }
}
