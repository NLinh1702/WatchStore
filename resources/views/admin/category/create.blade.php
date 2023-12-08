@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới danh mục sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh mục sản phẩm</li>
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
                        <div class="card card-primary">
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                        <div class="form-group {{ $errors->first('c_name') ? 'has-error' : '' }}">
                                            <label for="name">Tên danh mục<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="c_name"
                                                placeholder="Name ...">
                                            @if ($errors->first('c_name'))
                                                <span class="text-danger">{{ $errors->first('c_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Danh mục cha<span class="text-danger">*</span></label>
                                            <select name="c_parent_id" class="form-control" id="">
                                                <option value="0">--Danh mục--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        <?php $str = '';
                                                        for ($i = 0; $i < $category->level; $i++) {
                                                            echo $str;
                                                            $str .= '-- ';
                                                        } ?>
                                                        {{ $category->c_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" hidden>
                                    <div class="box box-warning">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Hình Ảnh</h3>
                                        </div>
                                        <div class="box-body block-images">
                                            <div style="margin-bottom: 10px">
                                                <img src="/images/noimg.jpg"
                                                    onerror="this.onerror=null;this.src='/images/noimg.jpg';"
                                                    alt="" class="img-thumbnail"
                                                    style="width: 200px;height: 200px;">
                                            </div>
                                            <div style="position:relative;"> <a class="btn btn-primary" href="javascript:;">
                                                    Chọn ảnh.. <input type="file"
                                                        style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;"
                                                        name="c_avatar" size="40" class="js-upload"> </a> &nbsp; <span
                                                    class="label label-info" id="upload-file-info"></span> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="box-footer text-center">
                                        <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                             Làm mới
                                        </button>
                                        <button type="submit" class="btn btn-info">Lưu</button>
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
