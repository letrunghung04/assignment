<?php

namespace App\Http\Controllers\Admins;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public $san_phams;
    public function __construct()
    {
        $this->san_phams = new SanPham();
    }
    public function index()
    {
        $title = "Danh sách sản phẩm";
        $listSanPham = SanPham::get();
        return view('admins.sanpham.index', compact('title','listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDanhMuc = DanhMuc::get();
        $title = "Thêm sản phẩm";
        return view('admins.sanpham.create', compact('title', 'listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('hinh_anh')){
                $filename = $request->file('hinh_anh')->store('uploads/sanpham','public');
            } else{
                $filename = null;
            };
            $params['hinh_anh'] = $filename;
            SanPham::create($params);
            return redirect()->route('san_pham.index')->with('success', 'Thêm sản phầm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa sản phẩm";
        $listDanhMuc = DanhMuc::get();
        $sanPham = SanPham::findOrFail($id);
        return view('admins.sanpham.update', compact('title', 'sanPham', 'listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->except('_token', '_method');
            $sanPham = SanPham::findOrFail($id);
            if($request->hasFile('hinh_anh')){
                if($sanPham->hinh_anh){
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else{
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }
            $sanPham->update($params);
        }
        return redirect()->route('san_pham.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->isMethod('DELETE')) {
    
            $sanPham = SanPham::query()->findOrFail($id);

            $sanPham->delete();

            if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                Storage::disk('public')->delete($sanPham->hinh_anh);
            }

            return redirect()->route('san_pham.index')->with('success', 'Xóa sản phầm thành công!');
        }
    }
}
