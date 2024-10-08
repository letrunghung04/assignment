<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh sách tài khoản";
        $listTaiKhoan = TaiKhoan::get();
        return view('admins.taikhoan.index', compact('title', 'listTaiKhoan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $title = "Sửa tài khoản";
        $listChucVu = ChucVu::get();
        $taiKhoan = TaiKhoan::findOrFail($id);
        return view('admins.taikhoan.update', compact('title', 'taiKhoan', 'listChucVu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $params = $request->except('_token', '_method');
            $taiKhoan = TaiKhoan::findOrFail($id);
            if($request->hasFile('anh_dai_dien')){
                if($taiKhoan->anh_dai_dien){
                    Storage::disk('public')->delete($taiKhoan->anh_dai_dien);
                }
                $params['anh_dai_dien'] = $request->file('anh_dai_dien')->store('uploads/taikhoan', 'public');
            } else{
                $params['anh_dai_dien'] = $taiKhoan->anh_dai_dien;
            }
            $taiKhoan->update($params);
        }
        return redirect()->route('tai_khoan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
