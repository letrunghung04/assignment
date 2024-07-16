<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;
    public function getList(){
        $listSanPham = DB::table('san_phams')
        ->orderBy('id', 'ASC')
        ->get();
        return $listSanPham;
    }

    public function createProduct($data){
        DB::table('san_phams')->insert($data);
    }
}
