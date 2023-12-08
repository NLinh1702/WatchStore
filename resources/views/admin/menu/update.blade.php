@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cập nhật danh mục bài viết</h1>
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
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="form-group {{ $errors->first('mn_name') ? 'has-error' : '' }}">
                                            <label for="name">Tên danh mục<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{ $menu->mn_name }}"
                                                name="mn_name" placeholder="Name ...">
                                            @if ($errors->first('mn_name'))
                                                <span class="text-danger">{{ $errors->first('mn_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="box-footer text-center">
                                            <a href="{{ route('admin.menu.index') }}" class="btn btn-danger">
                                                Quay lại</a>
                                            <button type="submit" class="btn btn-success">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
