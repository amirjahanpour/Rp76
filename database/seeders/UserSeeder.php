<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "name" => "Reza Parsian",
                "email" => "info@rp76.ir",
                "username" => "reza",
                "is_admin" => 1,
                "password" => bcrypt("12345678")
            ]
        ]);
    }
}
