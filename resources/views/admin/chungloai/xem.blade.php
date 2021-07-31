@extends('admin.layouts.index')

@section('timkiem')
    <form method="get" action="{{ route('chungloai.index') }}"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="keySearch" class="form-control bg-light border-0 small" placeholder="Tìm kiếm"
                aria-label="Search" name="TimKiem" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('noidung')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chủng loại</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif

                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID </th>
                            <th>Tên</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 0; ?>
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ ++$stt }}</td>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->ten }}</td>
                                <td>
                                    <form action="{{ route('chungloai.destroy', $value->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="quanli/chungloai/{{ $value->id }}/edit"
                                            class="btn btn-sm btn-primary">Sửa</a>
                                        <input type="submit" value="Xóa" class="btn btn-sm btn-danger">
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="ml-3">
            {!! $data->links() !!}
        </div>
    </div>
@endsection
