@extends('layouts.app_master_user')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/user.min.css') }}">
@endsection
@section('content')
    <section>
        <div class="title text-center" style="background: #f5f5f5; padding: 10px; margin: 15px 0;">Chi tiết đơn hàng #DH{{ $transaction->id }}</div>
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
            <div>
                @if($transaction->tst_status == 1)
                    <a href="{{ route('admin.action.transaction', ['cancel', $transaction->id]) }}"
                        class="js-delete-confirm btn btn-danger" style="margin-left: 780px; background-color: red">Hủy Đơn</i>
                    </a>
                @elseif($transaction->tst_status == -1)
                    <a href="{{ route('admin.transaction.delete', $transaction->id) }}"
                        class="js-delete-confirm btn btn-danger" style="margin-left: 780px; background-color: red">Xóa đơn</i>
                    </a>
                @elseif($transaction->tst_status == 2)
                    <a href="{{ route('admin.action.transaction', ['success', $transaction->id]) }}"
                        class="btn btn-danger" style="margin-left: 780px; background-color: #59a238">Đã nhận hàng</i>
                    </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4" style="width: 50%;">
                <h6 class="text-center">Thông tin người nhận</h6>
                <div class="box">
                    <p>Khách hàng:<b> {{ $transaction->user->name ?? "[N\A]" }}</b></p>
                    <p>Địa chỉ: <span>{{ $transaction->tst_address }}</span></p>
                </div>
            </div>
          
            <div class="col-4" style="width: 50%;">
                <h6 class="text-center">Tổng tiền thanh toán</h6>
                <div class="box">
                    <p>Phí vận chuyển : <span>0 VNĐ</span></p>
                    <p>Tổng tiền: <b>{{ number_format($transaction->tst_total_money,0,',','.') }} VNĐ</b></p>
                </div>
            </div>
        </div>
        <div class="content">
            <h6 class="text-center" style="font-size: 24px">Thông tin sản phẩm</h6>
            @include('user.include._inc_list_product_order')
            {{-- <div>
                <a href="{{ route('get.user.transaction') }}" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Quay lại</a>
                @if ($transaction->tst_status != -1)
                    <a href="{{ route('get.user.tracking_order', $transaction->id) }}" class="btn btn-primary js-">Theo dõi đơn hàng <i class="fa fa-angle-double-right"></i></a>
                @endif
            </div> --}}
        </div>
    </section>
@endsection
