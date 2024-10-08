<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function listCart(){
        // session()->put('cart', []);
        $cart = session()->get('cart', []);

        $total = 0;
        $subTotal = 0;

        foreach($cart as $item){
            $subTotal += $item['gia'] * $item['so_luong'];
        }

        $shipping = 30000;
        $total = $subTotal + $shipping;
        return view('clients.giohang', compact('cart', 'subTotal', 'shipping', 'total',));
    }

    public function addCart(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $sanPham = SanPham::query()->findOrFail($productId);

        // Khởi tạo 1 mảng chứa thông tin giỏ hàng trên session
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // SP đã tồn tại trong giỏ hàng
            $cart[$productId]['so_luong'] += $quantity;
        }else{
            $cart[$productId] = [
                'ten_san_pham' => $sanPham->ten_san_pham,
                'so_luong' => $quantity,
                'gia' => isset($sanPham->gia_khuyen_mai) ? $sanPham->gia_khuyen_mai : $sanPham->gia_san_pham,
                'hinh_anh' => $sanPham->hinh_anh,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function updateCart(){
        
    }
}
