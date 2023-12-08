@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Event</li>
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
                                    <a href="{{ route('admin.event.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tiêu đề</th>
                                    <th>Link</th>
                                    <th>Banner</th>
                                    <th>Vị trí</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                @if (isset($events))
                                    @foreach($events as $key => $event)
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->e_name }}</td>
                                            <td>{{ $event->e_link }}</td>
                                            <td>
                                                <img src="{{ pare_url_file($event->e_banner) }}" style="width: 100px;height: 40px">
                                            </td>
                                            <td>
                                                @if($event->e_position_1 !== 0)
                                                    <p>Home 1</p>
                                                @elseif($event->e_position_2 !== 0)
                                                    <p>Home 2</p>
                                                @elseif($event->e_position_3 !== 0)
                                                    <p>Home 3</p>
                                                @elseif($event->e_position_4 !== 0)
                                                @endif
                                            </td>
                                            <td>{{  $event->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.event.update', $event->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{  route('admin.event.delete', $event->id) }}" class="btn btn-sm btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
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