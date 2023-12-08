@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý banner trang chủ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin.slide.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Vị trí</th>
                                    <th>Target</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành dộng</th>
                                </tr>
                                @if (isset($slides))
                                    @foreach($slides as $slide)
                                        <tr>
                                            <td>{{ $slide->id }}</td>
                                            <td>{{ $slide->sd_title }}</td>
                                            <td>
                                                @if ($slide->sd_active == 1)
                                                    <a href="{{ route('admin.slide.active', $slide->id) }}" class="btn btn-sm btn-info">Hiên Thị</a>
                                                @else 
                                                    <a href="{{ route('admin.slide.active', $slide->id) }}" class="btn btn-sm btn-danger">Không Hiển Thị</a>
                                                @endif
                                            </td>
                                            <td>{{  $slide->sd_sort }}</td>
                                            <td>{{  $slide->sd_target }}</td>
                                            <td>{{  $slide->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.slide.update', $slide->id) }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{  route('admin.slide.delete', $slide->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
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
                    {{-- {!! $slides->links() !!} --}}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection