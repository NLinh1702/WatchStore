@if (isset($product))
    <div class="product-item">
        <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title="" class="avatar image contain">
            <img alt="{{  $product->pro_name }}" data-src="{{ pare_url_file($product->pro_avatar) }}" src="{{  asset('images/preloader.gif') }}" class="lazyload lazy">
        </a>
        <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}"
         title="{{  $product->pro_name }}" class="title text-center" style="font-weight:500">
            <h3>{{  $product->pro_name }}</h3>
        </a>
        
        <p class="rating text-center" >
            <span>
                @php 
                    $iactive = 0;
                    if ($product->pro_review_total){
                        $iactive = round($product->pro_review_star / $product->pro_review_total,2);    
                    }
                    
                @endphp
                @for($i = 1 ; $i <= 5 ; $i ++)
                    <i class="la la-star {{ $i <= $iactive ? 'active' : ''  }}"></i>
                @endfor
            </span>
            {{-- <span class="text" >{{ $product->pro_review_total }} review</span> --}}
        </p>
        @if ($product->pro_sale)
            <p class="text-center">
                
                @php 
                    $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                @endphp
                <span class="price">{{  number_format($price,0,',','.') }}đ(-{{ $product->pro_sale }}%)</span>
                <span class="price-sale">{{ number_format($product->pro_price,0,',','.') }} </span>
            </p>
        @else 
            <p class="price text-center">{{  number_format($product->pro_price,0,',','.') }}đ </p>
        @endif
        
    </div>
@endif