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
        Schema::create('borrow_e_q_s', function (Blueprint $table) {
            $table->id();            
            $table->integer('user_borrow_id')->comment('User ID Borrow');
            $table->integer('user_borrow_accept')->comment('User ID Accept');
            $table->integer('eq_id')->comment('EQ ID');
            $table->integer('stage_borrow')->default(0)->comment('EQ Status: 0 = Pending, 1 = Accepted, 2 = Rejected');
            $table->dateTime('borrow_date')->nullable()->comment('Borrow Date');
            $table->dateTime('return_date')->nullable()->comment('Return Date');
            $table->string('borrow_type')->nullable()->comment('Borrow type');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_e_q_s');
    }
};
