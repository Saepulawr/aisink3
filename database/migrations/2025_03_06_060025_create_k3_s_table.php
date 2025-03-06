<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('k3s', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('labour_accident')->default(0);
            $table->integer('small_accident')->default(0);
            $table->integer('traffic_accident')->default(0);
            $table->integer('near_miss')->default(0);
            $table->integer('pak')->default(0);
            $table->integer('jumlah_pekerja')->default(0);
            $table->integer('jam_kerja_aman')->default(0);
            $table->integer('hari_kerja_aman')->default(0);
            $table->text("running_text")->default("");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('k3s');
    }
};
