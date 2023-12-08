<section class="top-header desktop" style="background-color: #627d89; padding: 0.2rem">
    <div class="container">
        <div class="content">
            {{-- <div class="left">style="padding: .2rem;"
                <a href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                 <a href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
            </div>
            <div class="right">
                @if (Auth::check())
                    <a href="{{  route('get.user.dashboard') }}">{{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
             </div> --}}
        </div>
    </div>
</section>
{{-- <section class="top-header mobile">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                <a href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
                @if (Auth::check())
                    <a href="">{{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
            </div>
        </div>
    </div>
</section> --}}

<div class="commonTop">
    <div id="headers" style="background: #1a1919">
        <div class="container header-wrapper">
            <!--Thay đổi-->
            <div class="logo">
                <a href="/" class="desktop">
                    <img src="{{ url('images/NLSTORE_2.png') }}" style="height: 50px;" alt="Home">
                </a>
                <span class="menu js-menu-cate"><i class="fa fa-bars" aria-hidden="true"></i> </span>
            </div>
            <div class="search">
                <form action="{{ $link_search ?? route('get.product.list',['k' => Request::get('k')]) }}" role="search" method="GET">
                    <input type="text" name="k" value="{{ Request::get('k') }}" class="form-control" placeholder="Bạn muốn tìm gì...">
                    <button type="submit" class="btnSearch" style="background: #03a9f4; border: 1px solid darkgray;">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <ul class="right">
                <li>
                    <a href="{{ route('get.shopping.list') }}" title="Giỏ hàng">
                        <i class="la la-shopping-cart"></i>
                        <span class="text">
                            <span class="">Cart({{ \Cart::count() }})</span>
                            <span></span>
                        </span>
                    </a>
                </li>
                <li class="desktop">
                    <a href="#" title="">
                        @if (Auth::check())
                        <img src="{{ pare_url_file(Auth::user()->avatar) }}" alt="" style="width:30px; height:30px; border-radius:50%">
                        <a href="{{  route('get.user.dashboard') }}" style="margin:8px">{{ Auth::user()->name }}</a>
                        {{-- <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>--}}
                        <a href="{{  route('get.logout') }}"><i class="fa fa-sign-in" style="margin:4px; color: #03a9f4; font-size: 18px;"></i> Đăng Xuất </a> 
                    @else
                        <a href="{{  route('get.login') }}" style="margin:8px"><i class="fa fa-user-circle" style="margin:4px ; color: #03a9f4; font-size: 18px;"></i>Đăng Nhập</a>
                        <a href="{{  route('get.register') }}" ><i class="fa fa-address-card" style="margin:4px; color: #03a9f4; font-size: 18px;"></i>Đăng Ký</a>
                    @endif
                    </a>
                </li>
            </ul>
            {{-- <div class="right">
                @if (Auth::check())
                    <a href="{{  route('get.user.dashboard') }}">{{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
             </div> --}}
            {{-- <ul>
                <li><a href="#home">Trang chủ</a></li>
                <li><a href="#news">Tin tức</a></li>
                <li><a href="#contact">Liên hệ</a></li>
                <li><a href="#about">Về chúng tôi</a></li>
            </ul> --}}
           
            <div id="menu-main" class="container" style="display: none;">
                <ul class="menu-list">
                    @foreach($categories as $item)
                    <li>
                        <a href="{{  route('get.category.list', $item->c_slug.'-'.$item->id) }}"
                           title="{{  $item->c_name }}" class="js-open-menu">
                            {{-- <img src="{{ pare_url_file($item->c_avatar) }}" alt="{{ $item->c_name }}"> --}}
                            <span>{{  $item->c_name }}</span>
                            @if (isset($item->children) && count($item->children))
                                <span class="fa fa-angle-right"></span>
                            @else
                                <span></span>
                            @endif
                        </a>
                        @if (isset($item->children) && count($item->children))
                        <div class="submenu">
                            <div class="group">
                                <div class="item">
                                    @foreach($item->children as $children)
                                        <a href="{{  route('get.category.list', $children->c_slug.'-'.$children->id) }}"
                                           title="{{  $children->c_name }}" class="js-open-menu">
                                            <span>{{  $children->c_name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
