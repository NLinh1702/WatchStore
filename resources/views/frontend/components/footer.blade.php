<div id="footer">
    <div class="container footer">
        <div class="footer__left">
            <div class="top">
                <div class="item">
                    <div class="title">Về chúng tôi</div>
                    <ul>
                        <li>
                            <a href="#">Bài viết</a>
                        </li>
                        <li>
                            <a href="{{ route('get.product.list') }}">Sản phẩm</a>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Tin tức</div>
                    <ul>
                        @if (isset($menus))
                            @foreach($menus as $menu)
                                <li>
                                    <a title="{{ $menu->mn_name }}"
                                        href="{{ route('get.article.by_menu',$menu->mn_slug.'-'.$menu->id) }}">
                                        {{ $menu->mn_name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                        <li><a href="{{ route('get.contact') }}">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Chính sách</div>
                    <ul>
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Địa chỉ</div>
                    <ul>
                        <li><a href="#">17A, Lý Văn Lâm, Cà Mau</a></li>
                        <li><a href="#">3/2, Ninh Kiều, Cần Thơ</a></li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Liên hệ</div>
                    <ul>
                        <li><a href="{{ route('get.static.shopping_guide') }}"><a href="" class="fa fa fa-youtube"></a></a></li>
                        <li><a href="{{  route('get.static.return_policy') }}"><a href="" class="fa fa-facebook-official"></a></a></li>
                    </ul>
                </div>
            </div>
            <div class="item text-center">
                <div class="title">LỜI CẢM ƠN</div>
                <ul>
                    <li><a href="" style="color: #fff">Chúng tôi хin chân thành cảm ơn quý khách hàng đã đánh giá cao ѕự tin tưởng ᴠà tín nhiệm của quý khách đối ᴠới chúng tôi.</a></li>
                    <li><a href="{{  route('get.static.return_policy') }}"><a href="" class="fa fa-facebook-official"></a></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=3205159929509308&autoLogAppEvents=1"></script> --}}

