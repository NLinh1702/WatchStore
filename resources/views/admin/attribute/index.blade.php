@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý Màu sắc-Kích thước</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Màu sắc-Kích thước</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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
                                    <a href="{{ route('admin.attribute.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Thêm mới</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr style="text-align:center; background-color:cadetblue;">
                                    <th style="width: 10px">#</th>
                                    <th>Tên</th>
                                    <th>Kiểu</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                @if (isset($attibutes))
                                    @foreach($attibutes as $key => $attribute)
                                        <tr style="text-align: center">
                                            <td>{{ $attribute->id }}</td>
                                            <td>{{ $attribute->atb_name }}</td>
                                            <td style="text-align: center">
                                                <span class="btn btn-xs btn-info">{{ $attribute->type->t_name ?? "[N\A]" }}</span>
                                            </td>
                                            <td>{{  $attribute->created_at }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('admin.attribute.update', $attribute->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{  route('admin.attribute.delete', $attribute->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
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