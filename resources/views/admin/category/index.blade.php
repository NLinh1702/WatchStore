@extends('layouts.app_master_admin')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý danh mục sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Nhóm sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.category.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Thêm mới</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr style="text-align: center; background-color:cadetblue">
                                        <th style="width: 10px">#</th>
                                        <th>Tên danh mục</th>
                                        {{-- <th>Ảnh</th> --}}
                                        {{-- <th>Trạng thái</th>
                                        <th>Hiển thị</th> --}}
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                    @if ($categories)
                                        @foreach ($categories as $key => $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->c_name }}</td>
                                                {{-- <td>
                                                    <img src="{{ pare_url_file($category->c_avatar ?? '') ?? '/images/noimg.jpg' }}"
                                                        onerror="this.onerror=null;this.src='/images/noimg.jpg';"
                                                        alt="" class="img-thumbnail"
                                                        style="width: 80px;height: 80px;">
                                                </td> --}}
                                                {{-- <td>
                                                    @if ($category->c_status == 1)
                                                        <a href="{{ route('admin.category.active', $category->id) }}"
                                                            class="btn btn-sm btn-info">Hiển thị</a>
                                                    @else
                                                        <a href="{{ route('admin.category.active', $category->id) }}"
                                                            class="btn btn-sm btn-warning">Ẩn</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($category->c_hot == 1)
                                                        <a href="{{ route('admin.category.hot', $category->id) }}"
                                                            class="btn btn-sm btn-info">Hiển thị</a>
                                                    @else
                                                        <a href="{{ route('admin.category.hot', $category->id) }}"
                                                            class="btn btn-sm btn-warning">Ẩn</a>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $category->created_at }}</td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('admin.category.update', $category->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="{{ route('admin.category.delete', $category->id) }}"
                                                        class="btn btn-sm btn-danger js-delete-confirm"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! $categories->links() !!}
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
