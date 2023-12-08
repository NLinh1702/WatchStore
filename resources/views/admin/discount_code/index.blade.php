@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý mã giảm giá</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách mã giảm giá</li>
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
                                <a href="{{ route('admin.discount.code.create') }}"><button type="button"
                                        class="btn btn-block btn-info"><i class="fa fa-plus"></i> Thêm mới</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr style="text-align:center; background-color:cadetblue;">
                                    <th style="width: 10px">#</th>
                                    <th>Mã code</th>
                                    <th>Số lượt sử dụng</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Phần trăm giảm giá</th>
                                    <th>Hành động</th>
                                </tr>
                                @if ($discountCodes)
                                    @foreach($discountCodes as $key => $discount)
                                        <tr>
                                            <td>{{ $discount->id }}</td>
                                            <td>{{ $discount->d_code }}</td>
                                            <td style="text-align: center">{{ $discount->d_number_code }}</td>
                                            <td>{{ $discount->d_date_start }}</td>
                                            <td>{{ $discount->d_date_end }}</td>
                                            <td style="text-align: center">{{ $discount->d_percentage }} %</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('admin.discount.code.update', $discount->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{  route('admin.discount.code.delete', $discount->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
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
                    {!! $discountCodes->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
