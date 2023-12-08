@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý nhà cung cấp</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Nhà cung cấp</li>
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
                                    <a href="{{ route('admin.producer.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Thêm mới</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr style="text-align: center; background-color:cadetblue">
                                    <th style="width: 10px">#</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                @if (isset($producers))
                                    @foreach($producers as $key => $producer)
                                        <tr>
                                            <td>{{ $producer->id }}</td>
                                            <td>{{ $producer->pdr_name }}</td>
                                            <td>{{ $producer->pdr_email }}</td>
                                            <td>{{ $producer->pdr_phone }}</td>
                                            <td>{{ $producer->created_at }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('admin.producer.update', $producer->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{  route('admin.producer.delete', $producer->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
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
            <div class="box-footer">
                {!! $producers->appends($query)->links() !!}
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection