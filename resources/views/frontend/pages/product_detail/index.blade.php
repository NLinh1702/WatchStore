@extends('layouts.app_master_frontend')
@section('css')
    <style>
        <?php $style = file_get_contents('css/product_detail_insights.min.css');echo $style; ?>
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="breadcrumb">
            
        </div>
        
        <div class="card">
            <div class="card-body info-detail">
                <div class="left">
                    @if($product->pro_number === 0 )
                    <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title=""
                       class="">
                        <img alt="" style="max-width: 100% background-color: #000;opacity: 0.3;height:240px;" src="{{ pare_url_file($product->pro_avatar) }}"
                             class="lazyload">
                    </a>
                    <div style=" text-align: center;font-size: 30px;position: absolute;top: 40%;left: 16%;transform: translate(-50%, -50%);">
                                <h3>HẾT HÀNG</h3>
                            </div>
                    @else
                    <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title=""
                       class="">
                        <img alt="" style="max-width: 100%" src="{{ pare_url_file($product->pro_avatar) }}"
                             class="lazyload">
                    </a>
                    
                    @endif
                </div>
                <div class="right" id="product-detail" data-id="{{ $product->id }}" >
                    <h1 style="width: 360px;">{{  $product->pro_name }}</h1>
                    <div class="right__content">
                        <div class="info">

                            <div class="prices">
                                @if ($product->pro_sale)
                                    
                                    @php
                                        $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                    @endphp
                                    <p>
                                        <span
                                            class="value price-new">{{  number_format($price,0,',','.') }} đ * </span>  
                                            <del class="price-sale">{{ number_format($product->pro_price,0,',','.') }} đ</del>
                                        <span  class="sale">-{{  $product->pro_sale }}%</span>
                                    </p>
                                @else
                                    <p>
                                        Giá bán: <span class="value price-new">{{  number_format($product->pro_price,0,',','.') }} đ</span>
                                    </p>
                                @endif
                            </div>
                             <div class="infomation__group">
                                <div class="item">
                                    <p class="text1">Danh mục:</p>
                                    <h3 class="text2">
                                        @if (isset($product->category->c_name))
                                            <a href="{{  route('get.category.list', $product->category->c_slug).'-'.$product->pro_category_id }}">{{ $product->category->c_name }}</a>
                                        @else
                                            "[N\A]"
                                        @endif
                                    </h3>
                                </div>
                                <div class="item" style="background: none;">
                                    <p class="text1">Nhà cung cấp:</p>
                                    <h3 class="text2">{{ isset($product->producer) && !empty($product->producer) ? $product->producer->pdr_name : ''  }}</h3>
                                </div>
                                <div class="item">
                                    <p class="text1">Sản phẩm trong kho:</p>
                                    <h3 class="text2" style="font-weight: 500">{{$product->pro_number}} sản phẩm</h3>
                                </div>
                            </div><br>
                            @if($product->attributes->count() > 0)
                                <div>
                                    <div style="margin-bottom: 10px">
                                        <div>
                                            <select name="size" id="product-size" class="form-control" style="padding: 8px;">
                                                <option value="">Chọn size</option>
                                                @foreach($product->attributes as $attribute)
                                                    @if($attribute->atb_type_id == 1)
                                                        <option value="{{ $attribute->atb_name }}" >{{ $attribute->atb_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <select name="color" id="product-color" class="form-control" style="padding: 8px;">
                                                <option value="">Chọn màu</option>
                                                @foreach($product->attributes as $attribute)
                                                    @if($attribute->atb_type_id == 2)
                                                        <option value="{{ $attribute->atb_name }}" >{{ $attribute->atb_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- <div>
                                <div style="float: left; width: 30%; line-height: 36px;">
                                    Giới tính :
                                </div>
                                <div>
                                    <label for="gender-male" style="line-height: 40px;"><input type="radio" name="gender" value="1" id="gender-male">&nbsp; Nam</label> &nbsp; &nbsp;
                                    <label for="gender-female"><input type="radio" name="gender" value="2" id="gender-female">&nbsp; Nữ</label>
                                </div>
                            </div> --}}
                            <div style="clear: both;"></div>
                            <div class="btn-cart">
                                @if($product->pro_number === 0 )
                                    <a href="{{ route('get.shopping.add', $product->id) }}" title=""
                                    class="muangay" style="background-color: #e4dede">
                                        <span>Mua ngay</span>
                                    </a>
                                    <a href="{{ route('ajax_get.user.add_favourite', $product->id) }}"
                                    title="Thêm sản phẩm yêu thích"
                                    class="muatragop  {{ !\Auth::id() ? 'js-show-login' : 'js-add-favourite' }}">
                                    <span><i class="fa fa-heart"> Yêu thích</span></i>
                                    </a>
                                @else
                                <a href="{{ route('get.shopping.add', $product->id) }}" title=""
                                    class="muangay">
                                        <span>Mua ngay</span>
                                    </a>
                                    <a href="{{ route('ajax_get.user.add_favourite', $product->id) }}"
                                    title="Thêm sản phẩm yêu thích"
                                    class="muatragop  {{ !\Auth::id() ? 'js-show-login' : 'js-add-favourite' }}">
                                    <span><i class="fa fa-heart"> Yêu thích</span></i>
                                    </a>
                                @endif
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="ads">
                    <a href="#" title="Banner" target="_blank"><img alt="Hoan tien" style="width: 100%"
                        src="{{ url('images/banner/apple-watch-se-2022-8.jpg') }}"></a>
                </div>
            </div>
            <div style="border-bottom: 1px solid #b2b2b2;"></div>
            @include('frontend.pages.product_detail.include._inc_content')
            @include('frontend.pages.product_detail.include._inc_ratings')
        </div>
        <div class="card-body product-des">
            <div class="left">
                <div class="tabs">
                    <div class="tabs__content">
                        <div class="product-five">
                            <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                                @foreach($productsSuggests as $product)
                                    <div class="item">
                                        @include('frontend.components.product_item',['product' => $product])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <a href="#" title="Banner" target="_blank">
                    <img alt="Hoan tien" style="margin-top: 20px; width: 100%; height: 310px;" src="{{ url('images/banner/banner_03.png') }}">
                </a>
            </div>
        </div>
    </div>
    {{--@if ($isPopupCaptcha >= 2)--}}
        {{--@include('frontend.pages.product_detail.include._inc_popup_captcha')--}}
    {{--@endif--}}
@endsection
@section('script')
    <script>
		var ROUTE_COMMENT = '{{ route('ajax_post.comment') }}';
		var CSS = "{{ asset('css/product_detail.min.css') }}";
		var URL_CAPTCHA = '{{ route('ajax_post.captcha.resume') }}';

    </script>
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/product_detail.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $('.muangay').click(function (event) {
                event.preventDefault();

                var link = $(this).attr('href');
                var size = $('#product-size').val();
                var color = $('#product-color').val();
                var gender = $('input[name=gender]:checked').val() !== undefined ? $('input[name=gender]:checked').val() : '';

                $.ajax({
                    url: link,
                    type: 'GET',
                    data : {
                        size : size,
                        gender : gender,
                        color : color,
                    }
                }).done(function (result) {
                    window.location = window.location.href;
                })
            })
        });
    </script>
@endsection
