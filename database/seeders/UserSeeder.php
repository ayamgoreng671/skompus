<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                // "id" => 1,
                "name" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("admin1234"),
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ],[
                // "id" => 1,
                "name" => "radit",
                "email" => "radit@gmail.com",
                "password" => Hash::make("radit1234"),
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ],[
                // "id" => 1,
                "name" => "arga",
                "email" => "arga@gmail.com",
                "password" => Hash::make("arga1234"),
                "created_at" => Carbon::now("Asia/Jakarta"),
                "updated_at" => Carbon::now("Asia/Jakarta"),
            ]]);
            
    }
}
