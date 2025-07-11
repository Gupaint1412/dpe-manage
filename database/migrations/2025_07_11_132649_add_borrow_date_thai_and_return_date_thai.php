<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('borrow_e_q_s', function (Blueprint $table) {
            $table->string('borrow_date_th')->nullable()->comment('Borrow Date TH');
            $table->string('return_date_th')->nullable()->comment('Return Date TH');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('borrow_e_q_s', function (Blueprint $table) {
            //
        });
    }
};
