<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'prefix' => '-',
            'name' => 'อลงกลต',
            'surname' => 'ไม่เสื่อมสุข',
            'affiliation' => 'กองมาตรฐานอาคารสถานกีฬา',
            'job_group' => 'กลุ่มบริหารงานทั่วไป',
            'job_position' => 'เจ้าหน้าที่ธุรการ',
            'email' => 'alongkrod.m@dpe.go.th',
            'phone' => '-',
            'email_verified_at' => null,
            'password' => Hash::make('Dpe@2025'), // password
            'view_pass' => 'Dpe@2025',
            'remember_token' => null,
            'role' => '0',
            'created_at' => now(),
            'updated_at' => now(),
            'status' => '1',
            ],
        ]);
    }
}
