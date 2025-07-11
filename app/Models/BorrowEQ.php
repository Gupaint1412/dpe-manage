<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowEQ extends Model
{
    protected $fillable = [
        'user_borrow_id',       // ผู้ยืม
        'user_borrow_accept',   // ผู้อนุญาติให้ยืม
        'eq_id',                // id อุปกรณ์
        'state_borrow',         // สถานะการยืม
        'borrow_date',          // วันที่ยืม
        'return_date',          // วันที่คืน
        'borrow_type',          // ประเภทการยืม  ประชุม  อบรม  สัมมนา อื่นๆ
        'place_of_use',         // สถานที่นำไปใช้งาน
        'type_eq_borrow',       // ประเภทอุปกรณ์ที่ต้องการยืม
        'number_borrow',        // จำนวนอุปกรณ์ที่จะยืม
        'user_note',            // หมายเหตุจากผู้ใช่งาน
        'admin_note',           // หมายเหตุจากผู้ดูแลระบบ
        'job_of_use',           // งานที่ทำไปใช้งาน
    ];
}
