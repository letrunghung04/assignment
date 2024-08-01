<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function san_pham_chi_tiet(string $id){
        $sanPham = SanPham::query()->findOrFail($id);

        $listSanPham = SanPham::query()->get();
        return view('clients.sanphams.san_pham_chi_tiet');
    }
}
