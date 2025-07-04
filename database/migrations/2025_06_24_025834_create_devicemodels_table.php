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
        Schema::create('devicemodels', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('type_eq');
            $table->string('brand');
            $table->string('model');
            $table->string('eq_number');
            $table->string('eq_number_it');
            $table->integer('service_life');
            $table->string('os');
            $table->string('accessories')->nullable();
            $table->string('path_img')->nullable();
            $table->string('status')->default(0);
            $table->integer('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devicemodels');
    }
};
