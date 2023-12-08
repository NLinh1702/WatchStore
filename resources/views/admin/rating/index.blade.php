@extends('layouts.app_master_admin')
@section('content')
<style type="text/css">
    .ratings span i {
        color: #eff0f5;
    }
    .ratings span.active i {
        color: #faca51;
    }
</style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách đánh giá, chấm sao sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh mục bài viết</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr style="text-align: center; background-color:cadetblue">
                                    <th style="width: 10px">#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Người dùng </th>
                                    <th>Chấm sao</th>
                                    <th>Ngày đánh giá</th>
                                    <th>Hành động</th>
                                </tr>
                                @if (isset($ratings))
                                    @foreach($ratings as $key => $rating)
                                        <tr>
                                            <td>{{ $rating->id }}</td>
                                            <td>{{ $rating->product->pro_name ?? "[N\A]" }}</td>
                                            <td>{{ $rating->user->name ?? "[N\A]" }}</td>
                                            <td>
                                                <div class="ratings">
                                                    @for($i = 1 ; $i <= 5 ; $i ++)
                                                        <span class="{{  $i <= $rating->r_number ? 'active' : '' }}"><i class="fa fa-star"></i></span>
                                                    @endfor
                                                </div>
                                            </td>
                                            <td>{{ $rating->created_at }}</td>
                                            <td style="text-align: center;">
                                                <a href="{{  route('admin.rating.delete', $rating->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $ratings->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection