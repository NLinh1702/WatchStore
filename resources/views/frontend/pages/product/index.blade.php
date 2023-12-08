@extends('layouts.app_master_frontend')
@section('css')
    <style>
		<?php $style = file_get_contents('css/product_insights.min.css');echo $style;?>
        .filter-tab .active a {
            color: red;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="product-list">
            
            <div class="right">
                
                <div class="filter-tab">
                    <ul >
                        @for($i = 1; $i <= 6; $i++)
                            <li class="{{ Request::get('price') == $i ? "active" : "" }}" style="background: #d5d5d5;border-radius: 3px; color: #fff;display: inline-block; line-height: 27px; margin-left: 10px; padding: 0 5px;">
                                <a href="{{ request()->fullUrlWithQuery(['price' =>  $i]) }}">
                                    {{  $i == 6 ? "Trên 10 triệu" : "Giá < " . $i * 2  ." triệu" }}
                                </a>
                            </li>
                        @endfor
                    </ul>
                </div>
                {{-- {{  dd($products) }} --}}
                <div class="order-tab">
                    
                </div>
                <div class="group">
                    @foreach($products as $product)
                        @include('frontend.components.product_item', ['product' => $product])
                    @endforeach
                </div>
                <div style="display: block;">
                    {!! $products->appends($query ?? [])->links() !!}
                </div>
            </div>
            <div class="left" style="margin: 0px 8px;">
                @include('frontend.pages.product.include._inc_sidebar')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
		var CSS = "{{ asset('css/product_search.min.css') }}";
    </script>
    <script type="text/javascript" src="{{asset('js/product_search.js')}}">
    </script>
@endsection
