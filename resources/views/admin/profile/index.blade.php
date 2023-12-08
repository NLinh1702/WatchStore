@extends('layouts.app_master_admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thông tin tài khoản</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tài khoản</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{ $admin->name }}</h3>
                        <h5 class="widget-user-desc">{{ $admin->email }}</h5>
                      </div>
                      <div class="widget-user-image">
                        <img class="profile-user-img img-responsive img-circle"
                        src="{{ pare_url_file($admin->avatar) }}" alt="User profile picture">
                      </div>
                      <div class="card-footer">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.profile.update', $admin->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Họ tên</label>
                                <div class="col-sm-12">
                                    <input type="name" class="form-control" name="name" placeholder=""
                                        value="{{ $admin->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-6 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        value="{{ $admin->email }}">
                                    @if ($errors->first('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Phone</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="phone" placeholder="Name"
                                        value="{{ $admin->phone }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Địa chỉ</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Nhập địa chỉ cá nhân" value="{{ $admin->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-6 control-label">Ảnh đại diện</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-sm-offset-2 col-sm-10 ">
                                    <button type="submit" class="btn btn-success " style="margin-left: 80px;">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
            </div>
            <!-- /.row -->
    </section>
@endsection
