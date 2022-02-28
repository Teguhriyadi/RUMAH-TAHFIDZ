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
            "id" => 1,
            "nama" => "Mohammad Ilham",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "alamat" => "Bandung",
            "no_hp" => "000",
            "id_role" => 1
        ]);

        User::create([
            "id" => 2,
            "nama" => "Ahmad Fauzi",
            "email" => "pengajar@gmail.com",
            "password" => bcrypt("password"),
            "alamat" => "Bandung",
            "no_hp" => "001",
            "id_role" => 2
        ]);
    }
}
