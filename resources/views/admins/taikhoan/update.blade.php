@extends ('layouts.admin')


@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h1 text-center mt-3 mb-3"><?= $title ?></h1>
            <form action="{{ route('tai_khoan.update', $taiKhoan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" value="{{ $taiKhoan->ho_ten }}" name="ho_ten" placeholder="Nhập tên sản phẩm" disabled>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Ảnh đại diện</label>
                    <input type="text" class="form-control" value="{{ $taiKhoan->anh_dai_dien }}" name="anh_dai_dien" placeholder="Nhập tên sản phẩm" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ngày sinh</label>
                    <input type="text" class="form-control" value="{{ $taiKhoan->ngay_sinh }}" name="ngay_sinh" placeholder="Nhập tên sản phẩm" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $taiKhoan->email }}" name="email" placeholder="Nhập tên sản phẩm" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" value="{{ $taiKhoan->so_dien_thoai }}" name="so_dien_thoai" placeholder="Nhập tên sản phẩm" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Giới tính</label>
                    <select name="gioi_tinh" id="" disabled>
                        <option value="" selected>Chọn giới tính</option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" value="{{ $taiKhoan->dia_chi }}" name="dia_chi" placeholder="Nhập tên địa chỉ" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu</label>
                    <input type="text" class="form-control" value="{{ $taiKhoan->mat_khau }}" name="mat_khau" placeholder="Nhập tên mật khẩu" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Chức vụ</label>
                    <select name="chuc_vu_id" id="">
                        <option value="" selected>Chọn chức vụ</option>
                        @foreach ($listChucVu as $item)
                        <option value="{{$item->id}}">{{$item->ten_chuc_vu}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Trạng thái</label>
                    <select name="trang_thai" id="">
                        <option value="" selected>Chọn trạng thái</option>
                        <option value="0">Hoạt động</option>
                        <option value="1">Tạm ngưng</option>
                        
                    </select>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
                    <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
