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
                "name" => "admin",
                "email" => "admin@admin.ir",
                "username" => "admin",
                "is_admin" => 1,
                "password" => bcrypt("admin1234")
            ],

        ]);
    }
}
