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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten',50);
            $table->text('anh_dai_dien')->nullable();
            $table->date('ngay_sinh');
            $table->string('email')->unique();
            $table->string('so_dien_thoai')->nullable();
            $table->unsignedInteger('gioi_tinh')->nullable();
            $table->string('dia_chi');
            $table->string('mat_khau');
            $table->unsignedBigInteger('chuc_vu_id');
            $table->boolean('trang_thai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
