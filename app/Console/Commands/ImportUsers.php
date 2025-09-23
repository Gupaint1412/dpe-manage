<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:users {file=users.csv}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import users from a CSV file and hash passwords';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = storage_path('app/' . $this->argument('file'));

        if (!file_exists($file)) {
            $this->error("❌ File not found: $file");
            return;
        }

        $this->info("📥 Importing users from $file ...");

        // เปิดไฟล์ CSV
        if (($handle = fopen($file, 'r')) !== false) {
            $header = fgetcsv($handle); // อ่าน header

            while (($row = fgetcsv($handle)) !== false) {
                $data = array_combine($header, $row);

                // สร้าง user ใหม่
                User::updateOrCreate(
                    ['email' => $data['email']], // ป้องกันซ้ำด้วย email
                    [                        
                        'email' => $data['email'],
                        'prefix' => $data['prefix'],
                        'name' => $data['name'],
                        'surname' => $data['surname'],
                        'affiliation' => $data['affiliation'],
                        'job_group' => $data['job_group'],
                        'job_position' => $data['job_position'],
                        'phone' => $data['phone'],
                        'email_verified_at' => $data['email_verified_at'] ?: null,
                        'password' => Hash::make($data['password']),
                        'view_pass' => $data['password'],
                        'remember_token' => $data['remember_token'] ?: null,
                        'role' => $data['role'],
                        'created_at' => $data['created_at'],
                        'updated_at' => $data['updated_at'],
                        'status' => $data['status'],                        
                    ]
                );

                $this->info("✅ Imported: {$data['email']}");
            }

            fclose($handle);
        }

        $this->info("🎉 Import finished!");
    }
    }

