@extends ('layouts.admin')


@section('title')
    {{-- Hiển thị dữ liệu trong blade --}}
    {{ $title }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h1 text-center mt-3 mb-3"><?= $title ?></h1>
            <form action="{{ route('san_pham.update', $sanPham->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" value="{{$sanPham->ten_san_pham}}" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh" onchange="showImage(event)">
                </div>
                <img src="" id="image_san_pham" alt="Hình ảnh sản phẩm" width="200px" style="display: none">
                <div class="mb-3">
                    <label for="" class="form-label">Giá sản phẩm</label>
                    <input type="number" class="form-control" value="{{$sanPham->gia_san_pham}}" name="gia_san_pham" min="1"
                        placeholder="Nhập giá sản phẩm">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Giá khuyến mại</label>
                    <input type="number" class="form-control" value="{{$sanPham->gia_khuyen_mai}}" name="gia_khuyen_mai" min="1"
                        placeholder="Nhập giá khuyến mại">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" value="{{$sanPham->so_luong}}" name="so_luong" min="0"
                        placeholder="Nhập số lượng sản phẩm">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Lượt xem</label>
                    <input type="number" class="form-control" value="{{$sanPham->luot_xem}}" name="luot_xem" min="1" placeholder="Nhập lượt xem">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Ngày nhập</label>
                    <input type="date" value="{{$sanPham->ngay_nhap}}" class="form-control" name="ngay_nhap" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Mô tả</label>
                    <textarea name="mo_ta" cols="30" rows="3" class="form-control">{{$sanPham->mo_ta}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Danh mục</label>
                    <select name="danh_muc_id" required>
                        <option value="" selected>Chọn danh mục</option>
                        @foreach ($listDanhMuc as $item)
                            <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Trạng thái</label>
                    <select name="trang_thai" required>
                        <option value="" selected>Trạng thái của sản phẩm</option>
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
@section('js')
    <script>
        function showImage(event){
            const image_san_pham = document.getElementById('image_san_pham');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(){
                image_san_pham.src = reader.result;
                image_san_pham.style.display = 'block';
            }

            if(file){
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
