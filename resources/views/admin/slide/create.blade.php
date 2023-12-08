@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới slide</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Banner</li>
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
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="form-group {{ $errors->first('sd_title') ? 'has-error' : '' }}">
                                            <label for="name">Tiêu đề <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="sd_title"
                                                placeholder="Name ...">
                                            @if ($errors->first('sd_title'))
                                                <span class="text-danger">{{ $errors->first('sd_title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->first('sd_link') ? 'has-error' : '' }}">
                                            <label for="name">Link <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="sd_link"
                                                placeholder="Link ...">
                                            @if ($errors->first('sd_link'))
                                                <span class="text-danger">{{ $errors->first('sd_link') }}</span>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label for="name">Target </label>
                                                    <select class="form-control" name="sd_target">
                                                        <option value="1">_blank</option>
                                                        <option value="2">_self</option>
                                                        <option value="3">_parent</option>
                                                        <option value="4">_top</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label for="name">Vị trí </label>
                                                    <input type="text" class="form-control" name="sd_sort"
                                                        value="{{ old('sd_sort', 0) }}" placeholder="0">
                                                    @if ($errors->first('sd_sort'))
                                                        <span class="text-danger">{{ $errors->first('sd_sort') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                <div class="box box-warning">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Hình Ảnh</h3>
                                    </div>
                                    <div class="box-body block-images">
                                        <div style="margin-bottom: 10px">
                                            <img src="/images/noimg.jpg"
                                                onerror="this.onerror=null;this.src='/images/noimg.jpg';" alt=""
                                                class="img-thumbnail img-responsive" style="width: 100%;height:300px;">
                                        </div>
                                        <div style="position:relative;">
                                            <a class="btn btn-primary" href="javascript:;">
                                                Chọn ảnh.. <input type="file"
                                                    style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;"
                                                    name="sd_avatar" size="40" class="js-upload"> </a> &nbsp; <span
                                                class="label label-info" id="upload-file-info"></span>
                                        </div>
                                    </div>
                                </div>
                                </div>


                                {{-- <div class="col-sm-8">
                            <h3 class="box-title">Banner</h3>
                            <div class="box-body block-images">
                                <div style="margin-bottom: 10px"> <img src="/images/no-image.jpg" onerror="this.onerror=null;this.src='/images/no-image.jpg';" alt="" class="img-thumbnail" style="width: 100%;height: 300px;"> </div>
                                <div style="position:relative;"> <a class="btn btn-primary" href="javascript:;"> Choose File... <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="sd_avatar" size="40" class="js-upload"> </a> &nbsp; <span class="label label-info" id="upload-file-info"></span> </div>
                            </div>
                        </div> --}}

                                <div class="card-body">
                                    <div class="btn-set">
                                        <div class="box-footer text-center">
                                            <a href="{{ route('admin.slide.index') }}" class="btn btn-danger">
                                                Quay lại <i class="fa fa-undo"></i></a>
                                            <button type="submit" class="btn btn-info">Lưu dữ liệu <i
                                                    class="fa fa-save"></i></button>
                                        </div>
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
