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
                    <h1 class="m-0">Quản lý bình luận sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Bình luận</li>
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
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Tên người dùng</th>
                                        <th>Nội dung </th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                    @if (isset($comments))
                                        @foreach ($comments as $key => $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>{{ $comment->user->name ?? '[N\A]' }}</td>
                                                <td>{{ $comment->cmt_content ?? '[N\A]' }}</td>
                                                <td>{{ $comment->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.comment.delete', $comment->id) }}"
                                                        class="btn btn-xs btn-danger js-delete-confirm"><i
                                                            class="fa fa-trash"></i> Delete</a>
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
                        {!! $comments->links() !!}
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
