@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới nhà cung cấp</h1>
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
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group {{ $errors->first('pdr_name') ? 'has-error' : '' }}">
                                        <label for="pdr_name">Tên nhà cung cấp <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('pdr_name') }}"
                                            name="pdr_name" placeholder="Name ...">
                                        @if ($errors->first('pdr_name'))
                                            <span class="text-danger">{{ $errors->first('pdr_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->first('pdr_email') ? 'has-error' : '' }}">
                                        <label for="pdr_email">Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('pdr_email') }}"
                                            name="pdr_email" placeholder="Email ...">
                                        @if ($errors->first('pdr_email'))
                                            <span class="text-danger">{{ $errors->first('pdr_email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->first('pdr_phone') ? 'has-error' : '' }}">
                                        <label for="pdr_phone">Số điện thoại<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('pdr_phone') }}"
                                            name="pdr_phone" placeholder="Phone ...">
                                        @if ($errors->first('pdr_phone'))
                                            <span class="text-danger">{{ $errors->first('pdr_phone') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="box-footer text-center " style="margin-top: 20px;">
                                            <button type="reset" class="btn btn-danger">Làm mới</button>
                                            <button type="submit" class="btn btn-success">Lưu</button>
                                        </div>
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
