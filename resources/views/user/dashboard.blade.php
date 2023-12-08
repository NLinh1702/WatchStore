@extends('layouts.app_master_user')
@section('css')
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@endsection
@section('content')
    <section>
        <div class="title text-center">Thống kê đơn</div>
        <div class="row">
            <div class="col-3">
                <div class="box-count" >
                    <div class="count-text" style="color: #00c0ef">{{ $totalTransaction }}</div>
                    <p class="count-name" style="color: #00c0ef">Tổng đơn</p>
                </div>
            </div>
            
            <div class="col-3">
                <div class="box-count">
                    <div class="count-text" style="color: #f39c12">{{ $totalTransactionProcess }}</div>
                    <p class="count-name" style="color: #f39c12">Đang giao hàng</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count">
                    <div class="count-text" style="color: #00a65a">{{ $totalTransactionSuccess }}</div>
                    <p class="count-name" style="color: #00a65a">Hoàn thành</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count">
                    <div class="count-text" style="color: #dd4b39">{{ $totalTransactionCancel }}</div>
                    <p class="count-name" style="color: #dd4b39">Đơn huỷ</p>
                </div>
            </div>
        </div>
    </section>
@endsection
