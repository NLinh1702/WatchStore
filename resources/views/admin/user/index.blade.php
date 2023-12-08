@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý thành viên</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thành viên</li>
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
                                        <th>Tên tài khoản</th>
                                        <th>Email</th>
                                        <th>Điện thoại</th>
                                        <th>Ngày tạo</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                    @if (isset($users))
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td style="text-align: center">
                                                    {{-- <a href="{{ route('admin.user.update', $user->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a> --}}
                                                    <a href="{{ route('admin.user.delete', $user->id) }}"
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
                        {!! $users->links() !!}
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
