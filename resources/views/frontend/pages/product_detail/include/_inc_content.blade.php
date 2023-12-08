{{-- @if (!empty($product->pro_description))
    <div class="reviews content_text" style="float: left; width: 100%;">
        <h4 class="reviews-title"><b class="product_details_title">Thông tin khuyến mại</b></h4>
        <div class="product_details_content">
            {!! $product->pro_description !!}
        </div>

    </div>
@endif --}}
<br>

@if(!empty($product->pro_content))
    <div class="reviews content_text" style="float: left; width: 100%;">
        <h4 class="reviews-title"><b class="product_details_title">Thông số kỹ thuật</b></h4>
        <div class="product_details_content ">
            {!! $product->pro_content !!}
        </div>

    </div>
@endif
