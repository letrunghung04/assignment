@extends('layouts.client')
@section('css')
@endsection
@section('content')
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Thumbnail</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $key => $item)
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#">
                                                    <img class="img-fluid" style="width: 100px"
                                                        src="{{ Storage::url($item['hinh_anh']) }}"alt="Product" /></a>
                                            </td>
                                            <td class="pro-title"><a
                                                    href="{{ route('san_pham_chi_tiet', $key) }}">{{ $item['ten_san_pham'] }}</a>
                                            </td>
                                            <td class="pro-price"><span>{{ number_format($item['gia'], 0, '', '.') }}</span>
                                            </td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <input type="number" class="quantityInput" data-price="{{ $item['gia'] }}" value="{{ $item['so_luong'] }}" />
                                                </div>
                                            </td>
                                            <td class="pro-subtotal">
                                                <span class="subtotal">{{ number_format($item['gia'] * $item['so_luong'], 0, '', '.') }}</span>
                                            </td>
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn-sqr">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="cart-update">
                                <a href="#" class="btn btn-sqr">Update Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Cart Totals</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>{{ number_format($subTotal, 0, '', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td>{{ number_format($shipping, 0, '', '.') }}</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount">{{ number_format($total, 0, '', '.') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="checkout.html" class="btn btn-sqr d-block">Proceed Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

            // cập nhật lại giá trị subtotal
            var price = parseFloat($input.data('price'));
            var subtotalElement = $input.closest('tr').find('.subtotal');
            var newSubtotal = newVal * price;

            subtotalElement.text(newSubtotal.toLocaleString('vi-VN') + 'đ');
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
