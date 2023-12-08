@extends('layouts.app_master_user')
@section('css')
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@endsection
@section('content')
    <section>
        <div class="title text-center" style="background: #f5f5f5; padding: 10px; margin: 15px 0;">Cập nhật thông tin</div>
        <form action="" method="POST" enctype="multipart/form-data" style="width: 350px;margin:0 auto;padding: 30px 0">
            @csrf
            <div class="form-group">
                <label for="">Họ tên</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Enter email">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="number" name="phone" class="form-control" value="{{ Auth::user()->phone }}" placeholder="Enter email">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" placeholder="Địa chỉ">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="from-group text-center">
                <div class="upload-btn-wrapper ">
                    <button class="btn-upload btn-primary">Chọn ảnh</button>
                    <input class="btn-upload" type="file" name="avatar" />
                </div>
            </div>

            <button type="submit" class="btn btn-blue btn-md">Cập nhật</button>
        </form>

    </section>
@endsection
