@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cập nhật Màu sắc-Kích thước</h1>
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
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                         @csrf
                         <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body">
                     
                            <div class="form-group {{ $errors->first('atb_name') ? 'has-error' : '' }}">
                                <label for="name">Tên <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="{{  $attribute->atb_name }}" name="atb_name"  placeholder="Name ...">
                                @if ($errors->first('atb_name'))
                                    <span class="text-danger">{{ $errors->first('atb_name') }}</span>
                                @endif
                            </div>
                  
                            <div class="form-group {{ $errors->first('atb_type_id') ? 'has-error' : '' }}">
                                <label for="atb_type_id">Kiểu <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="atb_type_id">
                                    @foreach($types as $key => $type)
                                        <option value="{{ $type->id }}" {{ $attribute->atb_type_id == $type->id ? "selected='selected'"  : '' }}>{{ $type->t_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('atb_type_id'))
                                    <span class="text-danger">{{ $errors->first('atb_type_id') }}</span>
                                @endif
                            </div>
                    

                        <div class="col-sm-12">
                            <div class="box-footer text-center "  style="margin-top: 20px;">
                                <a href="{{ route('admin.attribute.index') }}" class="btn btn-danger">
                                Quay lại</a>
                                <button type="submit" class="btn btn-success">Cập nhật</button>
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