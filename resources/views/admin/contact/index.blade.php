@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý liên hệ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Liên hệ</li>
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
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr style="text-align: center; background-color:cadetblue">
                                    <th style="width: 10px">#</th>
                                    <th>Tiêu đề</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Nội dung</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                @if (isset($contacts))
                                    @foreach($contacts as $key => $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->c_title }}</td>
                                            <td>{{ $item->c_email }}</td>
                                            <td>{{ $item->c_phone }}</td>
                                            <td>{{ $item->c_content }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td style="text-align: center">
                                                <a href="{{  route('admin.contact.delete', $item->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
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
                    {!! $contacts->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
