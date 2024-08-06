<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("students")->insert([
            [
                "nis" => "41246434",
                "name" => "Ayam Goreng",
                "email" => "ayam@gmail.com",
                "phone" => "08155775875",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ],
            [
                "nis" => "06749281",
                "name" => "Bebek Bakar",
                "email" => "bebek@gmail.com",
                "phone" => "08166543421",
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ],
            [
                "nis" => "31142980",
                "name" => "Kuda Renang",
                "email" => "kuda@gmail.com",
                "phone" => "08136687864",

                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ],            [
                "nis" => "11235098",
                "name" => "Lele Terbang",
                "email" => "lele@gmail.com",
                "phone" => "08143212267",

                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ],

        ]);
    }
}
