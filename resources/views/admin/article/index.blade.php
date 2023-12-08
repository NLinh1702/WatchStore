@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý bài viết</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Bài viết</li>
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
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.article.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Thêmmới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr style="text-align: center; background-color:cadetblue">
                                    <th style="width: 10px">#</th>
                                    <th style="width: 25%">Tiêu đề</th>
                                    <th>Danh mục</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>

                            </tbody>
                            @if (isset($articles))
                                    @foreach($articles as $key => $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td class="title-content"><p>{{ $article->a_name }}</p></td>
                                            <td style="text-align: center">
                                                <span class="label label-success " >{{ $article->menu->mn_name ?? "[N\A]" }}</span>
                                            </td>
                                            <td>
                                                <img src="{{ pare_url_file($article->a_avatar) }}" style="width: 80px;height: 80px">
                                            </td>
                                            <td style="text-align: center">
                                                @if ($article->a_active == 1)
                                                    <a href="{{ route('admin.article.active', $article->id) }}" class="btn btn-xs btn-info">Hiện</a>
                                                @else
                                                    <a href="{{ route('admin.article.active', $article->id) }}" class="btn btn-xs btn-default">Ẩn</a>
                                                @endif
                                            </td>
                                            <td>{{  $article->created_at }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('admin.article.update', $article->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{  route('admin.article.delete', $article->id) }}" class="btn  btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $articles->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
