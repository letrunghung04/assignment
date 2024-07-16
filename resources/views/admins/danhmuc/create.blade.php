@extends ('layouts.admin')


@section('title')
    {{ $title }}
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="h1 text-center mt-3 mb-3"><?= $title ?></h1>
<form action="{{route('danh_muc.store')}}" method="POST">
     @csrf
    <div class="mb-3">
        <label for="" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên sản phẩm">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Mô tả</label>
        <textarea name="mo_ta" cols="30" rows="3" class="form-control"></textarea>
    </div>

    <div class="mb-3 d-flex justify-content-center">
        <button type="reset" class="btn btn-outline-secondary me-3">Nhập lại</button>
        <button type="submit" class="btn btn-success">Thêm mới</button>
    </div>
</form>
    </div>
</div>

@endsection