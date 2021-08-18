@extends('admin.layouts.index')

@section('noidung')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Thêm giảm giá sản phẩm</h6>

        </div>

        @if (session('thongbao'))
            <div class="alert alert-success">
                {{ session('thongbao') }}
            </div>
        @endif

        <!-- Card Body -->
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger small">
                    @foreach ($errors->all() as $value)
                        {{ $value }}<br>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('sanpham.giamgia.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Nhập số lượng mua được giảm</span>
                        <input type="number" class="form-control" id="basic-url" name="tong_soluong"
                            value="{{ old('tong_soluong') }}" aria-describedby="basic-addon3">

                        <span class="input-group-text" id="basic-addon3">Nhập gía mua được giảm</span>
                        <input type="number" class="form-control" id="basic-url" name="giagiam"
                            value="{{ old('giagiam') }}" aria-describedby="basic-addon3">
                    </div>

                </div>

                <div class="input-group-prepend">
                    <span class="input-group-text">Sản phẩm giảm giá</span>
                    <div class="form-check" id='defaultCheck'>
                        <h5>Tên sản phẩm : {{ $sanpham->ten }} --- Giá : {{ number_format($sanpham->gia) }} vnđ --- Sale
                            :
                            {{ $sanpham->sale }}%
                        </h5>
                        <input type="hidden" name="id_sanpham" value="{{ $sanpham->id }}">
                    </div>
                </div>
                <a href="{{ route('sanpham.giamgia.index') }}" class="btn btn-primary mt-3">Về lại danh sách </a>
                <input type="submit" class="btn btn-success mt-3" value="Thêm giảm giá">

            </form>
        </div>
    </div>
@endsection
