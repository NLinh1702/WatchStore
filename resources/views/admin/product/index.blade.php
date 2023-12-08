@extends('layouts.app_master_admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý kho</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý kho</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="card-title">Danh sách các sản phẩm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form class="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="category" class="form-control">
                                        <option value="0">Danh mục</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ Request::get('category') == $item->id ? "selected='selected'" : '' }}>
                                                {{ $item->c_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                    <button type="submit" name="export" value="true" class="btn btn-info">
                                        <i class="fa fa-save"></i> Excel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.product.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Thêm mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr style="text-align:center; background-color:cadetblue;">
                                        <th style="width: 10px">#</th>
                                        <th>Tên</th>
                                        <th>Danh mục</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        {{-- <th>SP nổi bật</th> --}}
                                        <th>Trạng thái</th>
                                        {{-- <th>Ngày tạo</th> --}}
                                        <th>Hành động</th>
                                    </tr>

                                    </tbody>
                                    @if (isset($products))
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td style="width:30%" class="title-content"><p>{{ $product->pro_name }}</p></td>
                                                <td>
                                                    <span
                                                        class="label label-success">{{ $product->category->c_name ?? '[N\A]' }}</span>
                                                </td>
                                                <td>
                                                    <img src="{{ pare_url_file($product->pro_avatar) }}"
                                                        style="width: 80px;height: 100px">
                                                </td>
                                                <td style="text-align: center">{{ $product->pro_number - $product->pro_pay > 0 ? $product->pro_number - $product->pro_pay : 'Hết hàng' }}</td>
                                
                                                <td style="text-align: center">
                                                    @if ($product->pro_sale)
                                                        <span
                                                            style="text-decoration: line-through;">{{ number_format($product->pro_price, 0, ',', '.') }}
                                                            </span><br>
                                                        @php
                                                            $price = ((100 - $product->pro_sale) * $product->pro_price) / 100;
                                                        @endphp
                                                        <span>{{ number_format($price, 0, ',', '.') }} </span>
                                                    @else
                                                        {{ number_format($product->pro_price, 0, ',', '.') }} 
                                                    @endif

                                                </td>
                                                {{-- <td style="text-align: center">
                                                    @if ($product->pro_hot == 1)
                                                        <a href="{{ route('admin.product.hot', $product->id) }}"
                                                            class="btn btn-sm btn-info">Hiện</a>
                                                    @else
                                                        <a href="{{ route('admin.product.hot', $product->id) }}"
                                                            class="btn btn-sm btn-default">Ẩn</a>
                                                    @endif
                                                </td> --}}

                                                <td style="text-align: center">
                                                    @if ($product->pro_active == 1)
                                                        <a href="{{ route('admin.product.active', $product->id) }}"
                                                            class="btn btn-sm btn-info">Hiện</a>
                                                    @else
                                                        <a href="{{ route('admin.product.active', $product->id) }}"
                                                            class="btn btn-sm btn-default">Ẩn</a>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $product->created_at }}</td> --}}
                                                <td style="text-align: center">
                                                    <a href="{{ route('admin.product.update', $product->id) }}"
                                                        class="btn btn-sm btn-primary"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('admin.product.delete', $product->id) }}"
                                                        class="btn btn-sm btn-danger js-delete-confirm"><i
                                                            class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $products->appends($query)->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
