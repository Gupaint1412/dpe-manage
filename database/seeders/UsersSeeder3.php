<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UsersSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([
            [
                'email' => 'surayut.k@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุรยุทธ',
                'surname' => 'คงศรี',
                'affiliation' => 'กองมาตรฐานอาคารสถานกีฬา',
                'job_group' => 'กลุ่มมาตรฐานอาคารสถานกีฬา',
                'job_position' => '-',           
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
            [
                'email' => 'surasak.n@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุรศักดิ์',
                'surname' => 'น้อยทับทิม',
                'affiliation' => 'กองมาตรฐานอาคารสถานกีฬา',
                'job_group' => 'กลุ่มมาตรฐานอาคารสถานกีฬา',
                'job_position' => 'ผู้อำนวยการกลุ่มส่งเสริมและพัฒนามาตรฐานสถานการกีฬา',           
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
            [
                'email' => 'surasak.h@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุรศักดิ์',
                'surname' => 'หามนตรี',
                'affiliation' => 'กองมาตรฐานอาคารสถานกีฬา',
                'job_group' => 'กลุ่มมาตรฐานอาคารสถานกีฬา',
                'job_position' => 'ผู้อำนวยการกลุ่มสนามกีฬาแห่งชาติ',           
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
            [
                'email' => 'suratsada.p@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุรัสดา',
                'surname' => 'พรหมสิรินิมิต',
                'affiliation' => 'สำนักงานเลขานุการกรม',
                'job_group' => 'กลุ่มนิติการ',
                'job_position' => '-',           
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
            [
                'email' => 'surangkana.s@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุรางคณา',
                'surname' => 'สุริยคำ',
                'affiliation' => 'กองการต่างประเทศ',
                'job_group' => 'กลุ่มองค์กรระหว่างประเทศ',
                'job_position' => 'นักพัฒนาการกีฬา',           
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
            [
                'email' => 'suvimol.n@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุวิมล',
                'surname' => 'นิชาญ',
                'affiliation' => '-',
                'job_group' => 'กลุ่มสนามกีฬาเฉลิมพระเกียรติฯ',
                'job_position' => 'นักพัฒนาการกีฬา',           
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
            
            [
                'email' => 'adisai.j@dpe.go.th',
                'prefix' => '-',
                'name' => 'อดิศัย',
                'surname' => 'ใจกาวัง',
                'affiliation' => 'สำนักนันทนาการ',
                'job_group' => 'กลุ่มนันทนาการเด็กและเยาวชน',
                'job_position' => 'นักพัฒนาการกีฬาชำนาญการพิเศษ',           
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
            [
                'email' => 'adunyachart.k@dpe.go.th',
                'prefix' => '-',
                'name' => 'อดุลยชาติ',
                'surname' => 'ขันธมะ',
                'affiliation' => '-',
                'job_group' => 'กลุ่มพัฒนาผู้ตัดสินกีฬา',
                'job_position' => 'ผู้อำนวยการกลุ่มพัฒนาผู้ตัดสินกีฬา',           
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
            [
                'email' => 'sirilak.y@dpe.go.th',
                'prefix' => '-',
                'name' => 'สิริลักษม์',
                'surname' => 'ยอดปราง',
                'affiliation' => 'สำนักงานเลขานุการกรม',
                'job_group' => 'กลุ่มพัสดุ',
                'job_position' => '-',           
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
            [
                'email' => 'sukvasa.s@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุขวสา',
                'surname' => 'สุนทรชัย',
                'affiliation' => 'สำนักงานเลขานุการกรม',
                'job_group' => 'กลุ่มพัสดุ',
                'job_position' => '-',           
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
            [
                'email' => 'sujaree.k@dpe.go.th',
                'prefix' => '-',
                'name' => 'สุจารี',
                'surname' => 'ไกรนาค',
                'affiliation' => 'สำนักงานเลขานุการกรม',
                'job_group' => 'กลุ่มการคลัง',
                'job_position' => 'เจ้าพนักงานการเงินและบัญชีปฏิบัติงาน',           
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
