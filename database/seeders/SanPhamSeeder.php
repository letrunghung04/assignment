<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san_phams')->insert(
            [
                [
                    'ten_san_pham' => 'Air Force 1',
                    'gia_san_pham' => '2300000',
                    'gia_khuyen_mai' => '2000000',
                    'hinh_anh' => '',
                    'so_luong' => '20',
                    'luot_xem' => '',
                    'ngay_nhap' => '2024-11-20',
                    'mo_ta' => 'Mô tả sản phẩm 1',
                    'trang_thai' => true,
                    'danh_muc_id ' => '1',
                    
                ]
            ]
        );
    }
}
