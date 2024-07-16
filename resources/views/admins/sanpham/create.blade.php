@extends ('layouts.admin')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('content')

<div class="card">
    {{-- <h4 class="card-header">{{$title}}</h4> --}}
    <div class="card-body">
        <h1 class="h1 text-center mt-3 mb-3"><?= $title ?></h1>
<form action="{{route('san_pham.store')}}" method="POST">
    {{-- Làm việc với form trong laravel --}}
    {{-- 
        CSRF Field: là 1 trường ẩn mà Laravel bắt buộc phải có trong form
     --}}
     @csrf

    <div class="mb-3">
        <label for="" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Hình ảnh</label>
        <input type="text" class="form-control" name="hinh_anh">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Giá sản phẩm</label>
        <input type="number" class="form-control" name="gia_san_pham" min="1" placeholder="Nhập giá sản phẩm">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Giá khuyến mại</label>
        <input type="number" class="form-control" name="gia_khuyen_mai" min="1" placeholder="Nhập giá khuyến mại">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Số lượng</label>
        <input type="number" class="form-control" name="so_luong" min="0" placeholder="Nhập số lượng sản phẩm">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Lượt xem</label>
        <input type="number" class="form-control" name="luot_xem" min="1" placeholder="Nhập lượt xem">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Ngày nhập</label>
        <input type="date" class="form-control" name="ngay_nhap">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Mô tả</label>
        <textarea name="mo_ta" cols="30" rows="3" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Danh mục</label>
        <select name="danh_muc_id">
            <option selected>Danh mục sản phẩm</option>
            {{-- <option value="0">Hết hàng</option> --}}
            <option value="1">Nam</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Trạng thái</label>
        <select name="trang_thai">
            <option selected>Trạng thái của sản phẩm</option>
            <option value="0">Hết hàng</option>
            <option value="1">Còn hàng</option>
        </select>
    </div>

    <div class="mb-3 d-flex justify-content-center">
        <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
        <button type="submit" class="btn btn-success">Thêm mới</button>
    </div>
</form>
    </div>
</div>

@endsection