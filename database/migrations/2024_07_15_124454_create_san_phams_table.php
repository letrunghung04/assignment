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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham', 50);
            //unique: dữ liệu không được phép trùng nhau 
            $table->double('gia_san_pham', 10,2);
            $table->double('gia_khuyen_mai', 10, 2);
            $table->text('hinh_anh')->nullable();
            $table->unsignedInteger('so_luong')->nullable();
            //nullable: cho phép giá trị null
            $table->unsignedInteger('luot_xem')->nullable();
            $table->date('ngay_nhap');
            $table->text('mo_ta');
            $table->boolean('trang_thai')->default(0);
            $table->unsignedBigInteger('danh_muc_id');
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade');
            //defaul xét các giá trị mặc định
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
