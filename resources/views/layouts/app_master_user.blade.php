<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>{{ strtolower($title_page ?? "NLStore")   }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('ico.png') }}" />
    @yield('css')

    {{-- Thông báo --}}
    @if(session('toastr'))
        <script>
			var TYPE_MESSAGE = "{{session('toastr.type')}}";
			var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
</head>
<body>
@include('frontend.components.header')
<div class="container user">
    <div class="left">
        <div class="header">
            <img src="{{ pare_url_file(Auth::user()->avatar) }}" alt="">
            <p>
                <span class="text-center">Tài khoản</span>
                <span>{{ Auth::user()->name }}</span>
            </p>
        </div>
        <div class="content">
            <ul class="left-nav">
                @foreach(config('user') as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}">
                            <i class="{{ $item['icon'] }}" style="color: #03a9f4"></i>
                            <span>{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="right">
        @yield('content')
    </div>
    <div class="" style="clear: both"></div>
</div>
@include('frontend.components.footer')

<script>
	var DEVICE = '{{  device_agent() }}'
</script>
<script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
<div id="rasa-chat-widget" data-websocket-url="http://localhost:5005"></div>
<script src="https://unpkg.com/@rasahq/rasa-chat" type="application/javascript"></script>
@yield('script')

</body>
</html>
