@extends('layouts.app_master_frontend')
@section('css')
    <style>
        <?php $style = file_get_contents('css/auth.min.css');echo $style;?>
    </style>
@endsection
@section('content')
    <div class="container">
     
        <div class="auth" style="background: white;">
            <form class="from_cart_register" action="" method="post" style="width: 350px;margin:0 auto;padding: 30px 0">
                @csrf
                <h1 class="breadcrumb-header" style="text-align: center; font-size:24px">ĐĂNG NHẬP</h1>
                <div class="form-group">
                    <label for="name">Email <span class="cRed">*</span></label>
                    <input name="email" id="name" type="email" class="form-control" placeholder="Nhập địa chỉ email">
                    @if ($errors->first('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu <span class="cRed">*</span></label>
                    <input name="password" id="phone" type="password" placeholder="Nhập mật khẩu" class="form-control">
                    @if ($errors->first('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-purple btn-xs">Đăng nhập</button>
                    {{--<a href="{{ route('get.login.social',['social' => 'google']) }}">Google</a><br>
                    <a href="{{ route('get.email_reset_password') }}">Đăng Ký</a>--}}
                </div>
                <div class="form-group text-center">     
                    <span>Bạn chưa có tài khoản?</span>     
                    <a href="{{  route('get.register') }}" style="color: blue">Đăng Ký</a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        <?php $js = file_get_contents('js/home.js');echo $js;?>
    </script>
@endsection