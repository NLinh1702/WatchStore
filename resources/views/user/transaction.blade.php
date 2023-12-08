@extends('layouts.app_master_user')
@section('css')
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@endsection
@section('content')
    <section>
        <div class="title text-center" style="background: #f5f5f5; padding: 10px; margin: 15px 0;">Danh sách đơn hàng</div>
        <form class="form-inline">
            <div class="form-group" style="margin-right: 10px;">
                <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : "" }}>Chờ xác nhận</option>
                    <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : "" }}>Đang vận chuyển
                    </option>
                    <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : "" }}>Đã giao hàng
                    </option>
                    <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : "" }}>Huỷ bỏ</option>
                </select>
            </div>
            <div class="form-group" style="margin-right: 10px">
                <button type="submit" style="border-radius: 8px;" class="btn btn-primary btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Phương thức thanh toán</th>
                    <th scope="col">Thời gian đặt</th>
                    <th scope="col" class="text-center">Trạng thái</th>
                    <th scope="col" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <th scope="row">
                        <a href="{{ route('get.user.order', $transaction->id) }}">DH{{ $transaction->id }}</a>
                    </th>
                    <th>{{ number_format($transaction->tst_total_money,0,',','.') }} đ</th>
                    <th>
                        @if ($transaction->payment)
                            <div class="label label-info">Qua ví VnPay</div> 
                        @else
                            <div class="label label-light">Khi nhận hàng</div> 
                        @endif
                    </th>
                    <th>{{  $transaction->created_at }}</th>
                    <th>
                        <span
                            class="label label-{{ $transaction->getStatus($transaction->tst_status)['class'] }}">
                            {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                        </span>
                    </th>
                    <th scope="row">
                        <span class="label label-primary"><a href="{{ route('get.user.order', $transaction->id) }}" style="color: #ffffff">Xem chi tiết</a></span>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
