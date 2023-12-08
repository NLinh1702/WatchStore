@extends('layouts.app_master_user')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/user.min.css') }}">
@endsection
@section('content')
    <section>
        <div class="title text-center">Theo dõi đơn hàng #DH{{ $transaction->id }}</div>
        <div class="content">
            <h6 >Trạng thái đơn hàng : <span class="label label-success"> {{ $transaction->getStatus($transaction->tst_status)['name'] }}</span></h6>
            <div class="progress">
               
                <div class="progress-bar">
                    @foreach(config('shopping_cart.progress') as $key => $item)
                        <div class="progress-item {{ (int)$key < $transaction->tst_status ? 'active' : '' }}">
                            <span>{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <h6 class="text-center" style="font-size: 24px">Đơn hàng</h6>
            @include('user.include._inc_list_product_order')
            <div>
                <a href="{{ route('get.user.transaction') }}" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Quay lại đơn hàng</a>
            </div>
        </div>
    </section>
@endsection
