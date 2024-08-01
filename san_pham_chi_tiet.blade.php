@extends ('layouts.client')

@section('title')
    {{ $title }}
@endsection
@section('css')
    <style>
        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 5px;
            max-width: 400px;
            /* hoặc bất kỳ kích thước tối đa nào bạn muốn */
        }

        .image-grid img {
            width: 100%;
            height: auto;
            object-fit: cover;
            aspect-ratio: 1/1;
            /* Đảm bảo hình ảnh vuông */
        }
    </style>
@endsection
@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-8">
            {{-- <div class="image-grid">
                <img style="height: 349.99px; width: 349.99px;" class="object-fit-cover"
                    src="{{ Storage::url($sanPham->hinh_anh) }}" alt="">
            </div> --}}
            <div class="image-grid">
                @foreach ($sanPham->hinhAnhSanPham as $item)
                    <div class="col-6 mb-4">
                        <img style="height: 349.99px; width: 349.99px; " class="object-fit-cover"
                            src="{{ Storage::url($item->link_hinh_anh) }}" alt="">
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-3">
            <h2 class="fw-bold">{{ $sanPham->ten_san_pham }}</h2>
            <div style="justify-content: space-between">
                <h3 class="text-danger h6 fw-bold text-decoration-line-through">{{ $sanPham->gia_san_pham }} VNĐ</h3>
                <h3 class="text-danger h4 fw-bold">{{ $sanPham->gia_khuyen_mai }} VNĐ</h3>
            </div>
            <p class="text-muted" style="font-style: italic; font-size: 15px;">
                {{ $sanPham->mo_ta }}
            </p>
            <h3 class="h6 fw-bold">Trạng thái: {{ $sanPham->trang_thai == 0 ? 'Hết hàng' : 'Còn hàng' }}</h3>
            <h3 class="h6 fw-bold">Số lượng còn: {{ $sanPham->so_luong }}</h3>
            <h3 class="h6 fw-bold">Danh mục:
                {{ $sanPham->danh_muc_id == 1
                    ? 'Nam'
                    : ($sanPham->danh_muc_id == 2
                        ? 'Nữ'
                        : ($sanPham->danh_muc_id == 3
                            ? 'Trẻ em'
                            : 'Giảm giá')) }}
            </h3>
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <div class="quantity-cart-box d-flex align-items-center">
                    <h6 class="opption-title">Qty:</h6>
                    <div class="quantity">
                        <div class="pro-qty d-flex align-items-center">
                            <span class="qtybtn dec"><button type="">-</button></span>
                            <input type="number" value="1" name="quantity" id="quantityInput" min="1">
                            <span class="qtybtn inc"><button type="submit">+</button></span>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                    </div>
                </div><br>
                <div class="action_link">
                    <button class="btn btn-dark w-100 rounded-pill" style="height: 65px;" type="submit">Add to Cart
                        <i class="fa-solid fa-cart-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
    <h1 class="fw-bold mt-3 d-flex align-items-center" style="height: 70px;">NEW PRODUCT</h1>
    <div class="row">
        @foreach ($listSanPham as $item)
            <div class="col-3 mb-5">
                <div class="border-black border-top border-bottom overflow-hidden mt-3 mb-3" style="height: 380px;">
                    <div style="height: 70px;">
                        <h1 style="margin: 0px;" class="h5 d-flex align-items-start mb-2 mt-2">{{ $item->ten_san_pham }}
                        </h1>
                        <div style="height: 30px; font-size: 14px;" class="text-uppercase text-end text-danger-emphasis">
                            {{ $item->gia_san_pham }} VNĐ</div>
                    </div>
                    <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden mt-0">
                        <img src="{{ Storage::url($item->hinh_anh) }}" style="height:261px; width: 261px;"
                            class="object-fit-cover" alt="">
                    </div>
                </div>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <div class="text-end">
                        <a class="w-100" href="{{ route('san_pham_chi_tiet', $item->id) }}">
                            <button class="btn btn-dark w-50 btn-sm rounded-0 " style="height: 30px;">ADD TO CART</button>
                        </a>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script>
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="dec qtybtn">+</span>');
        $('.qtybtn').on('click', function() {
            var $button = $(this);
            var $input = $button.parent().find('input')
            var oldValue = parseFloat($input.val());

            if ($button.hasClass('inc')) {
                var newVal = oldValue + 1;
            } else {
                if (oldValue > 1) {
                    var newVal = oldValue - 1;

                } else {
                    var newVal = 1;

                }

            }
            $input.val(newVal);
        });

        $('quantityInput').on('change', function() {
            var value = parentInt($(this).val(), 10);

            if (isNaN(value) || value < 1) {
                alert('Số lượng nhập phải lớn hơn bằng 1')
                $(this).val(1)
            }
        })
    </script>
@endsection
