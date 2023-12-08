<div class="reviews content_text">
    
    <div class="dashboards">
        <h4 class="reviews-title">Có <b>{{ $product->pro_review_total }}</b> đánh giá </h4>
        <div class="item dashboards_sum">
            @php
                $age = 0;
                if ($product->pro_review_total)
                    $age = round($product->pro_review_star / $product->pro_review_total,2);
            @endphp
            <span style="font-size: 24px;"> {{ $age }} <i class="la la-star"></i></span>
        </div>
        {{-- <div class="item dashboards_item">
            @foreach($ratingDefault as $key => $item)
                <div class="item_review">
                    <span class="item_review-name">{{ $key }} <i class="la la-star"></i></span>
                    <div class="item_review-process">
                        <div>
                            @php 
                                $ageItem = 0;
                                if ($product->pro_review_total)
                                    $ageItem = ($item['count_number'] / $product->pro_review_total) * 100 ;
                            @endphp
                            <span style="width: {{ $ageItem }}%;"> </span>
                        </div>
                    </div>
                    <span class="item_review-count"><b>{{ $item['count_number']  }}</b> đánh giá</span>
                </div>
            @endforeach
        </div> --}}
        <div class="item dashboards_btn">
            <a href="javascript:;void(0)" title="Gửi đánh giá"
               class="btn btn-primary {{ \Auth::id() ? 'js-review' : 'js-show-login' }}">Đánh giá</a>
        </div>
    </div>
    @if (\Request::route()->getName() == 'get.product.rating_list')
        @include('frontend.pages.product_detail.include._inc_filter')
    @endif

    <div class="block-reviews" id="block-review">
        <form action="{{ route('ajax_post.user.rating.add') }}" id="form-review" method="POST">
            @csrf
            <div>
                <p style="margin-bottom: 0">
                    <span>Chọn đánh giá của bạn</span>
                    <span id="ratings" >
                        @for ($i =1 ; $i <= 5 ; $i ++)
                            <i class="la la-star active" data-i="{{ $i }}"></i>
                        @endfor
                    </span>
                    <span class="reviews-text" id="reviews-text">Rất tốt</span>
                </p>
            </div>
            <div>
                <textarea name="content_review"  id="rv_content" cols="30" rows="8" placeholder="Nhập đánh giá sản phẩm..."></textarea>
                <input type="hidden" name="review" id="review_value" value="5">
                <input type="hidden" name="product_id"  value="{{ $product->id }}">
            </div>
            <button type="submit" style="font-size: 14px;margin-top: 10px; margin-left: 637px;" class="btn btn-primary js-process-review">Đánh giá</button>
        </form>
    </div>
    <div class="reviews_list">
        @include('frontend.pages.product_detail.include._inc_list_reviews')
        {{-- {!! $reviews->links('vendor.pagination.simple-default') !!} --}}
    </div>
</div>