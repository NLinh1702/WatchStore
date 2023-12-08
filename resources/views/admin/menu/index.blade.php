@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản lý danh mục bài viết</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh mục bài viết</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.menu.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Thêm mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr style="text-align:center; background-color:cadetblue;">
                                    <th style="width: 10px">#</th>
                                    <th>Tên</th>
                                    {{-- <th>Ảnh</th> --}}
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                @if ($menus)
                                    @foreach($menus as $key => $menu)
                                        <tr>
                                            <td>{{ $menu->id }}</td>
                                            <td style="text-align: center">{{ $menu->mn_name }}</td>
                                            {{-- <td>
                                                <img src="{{ pare_url_file($menu->mn_avatar) }}" style="width: 80px;height: 80px;">
                                            </td> --}}
                                            <td style="text-align: center">
                                                @if ($menu->mn_status == 1)
                                                    <a href="{{ route('admin.menu.active', $menu->id) }}" class="btn btn-xs btn-info">Hiển thị</a>
                                                @else 
                                                    <a href="{{ route('admin.menu.active', $menu->id) }}" class="btn btn-xs btn-default">Không hiển thị</a>
                                                @endif
                                            </td>
                                            <td>{{  $menu->created_at }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('admin.menu.update', $menu->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{  route('admin.menu.delete', $menu->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection