<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = array(
            array('name' => 'آذربایجان شرقی'),
            array('name' => 'آذربایجان غربی'),
            array('name' => 'اردبیل'),
            array('name' => 'اصفهان'),
            array('name' => 'البرز'),
            array('name' => 'ایلام'),
            array('name' => 'بوشهر'),
            array('name' => 'تهران'),
            array('name' => 'چهارمحال و بختیاری'),
            array('name' => 'خراسان جنوبی'),
            array('name' => 'خراسان رضوی'),
            array('name' => 'خراسان شمالی'),
            array('name' => 'خوزستان'),
            array('name' => 'زنجان'),
            array('name' => 'سمنان'),
            array('name' => 'سیستان و بلوچستان'),
            array('name' => 'فارس'),
            array('name' => 'قزوین'),
            array('name' => 'قم'),
            array('name' => 'کردستان'),
            array('name' => 'کرمان'),
            array('name' => 'کرمانشاه'),
            array('name' => 'کهگیلویه و بویراحمد'),
            array('name' => 'گلستان'),
            array('name' => 'لرستان'),
            array('name' => 'گیلان'),
            array('name' => 'مازندران'),
            array('name' => 'مرکزی'),
            array('name' => 'هرمزگان'),
            array('name' => 'همدان'),
            array('name' => 'یزد')
        );
        DB::table("states")->insert($provinces);
    }
}
