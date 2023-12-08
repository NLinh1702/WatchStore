@extends('layouts.app_master_user')
@section('css')
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@endsection
@section('content')
    <section>
        <div class="title text-center" style="background: #f5f5f5; padding: 10px; margin: 15px 0;">Sản phẩm yêu thích</div>
        <div class="row mb-5">
           <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Ảnh</th>
                            <th class="w-25" scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <th>
                                    <img src="{{ pare_url_file($item->pro_avatar) }}" style="width: 60px;height: 60px">
                                </th>
                                <th>{{ $item->pro_name }}</th>
                                <th>{{ number_format($item->pro_price,0,',','.') }} đ</th>
                                <th>
                                    <a class="btn btn-success" href="{{  route('get.user.favourite.delete', $item->id) }}"><i class="la la-trash" style="color:red"></i></a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           </div>
        </div>
    </section>
@endsection
