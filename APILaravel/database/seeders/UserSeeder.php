<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "id" => time(),
            "nama" => "Mohammad Ilham",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "alamat" => "Bandung",
            "no_hp" => "000",
            "id_role" => 1
        ]);
    }
}
