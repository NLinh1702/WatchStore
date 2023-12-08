@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản lý đơn hàng</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="card-title">Danh sách các đơn hàng</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form class="">
                        <div class="row">
                            <div class="col-md-2">
                                <select name="status" class="form-control">
                                    <option value="">Trạng thái</option>
                                    <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : '' }}>
                                        Đã xử lý</option>
                                    <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : '' }}>
                                        Đang vận chuyển</option>
                                    <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : '' }}>Đã
                                        bàn giao</option>
                                    <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : '' }}>
                                        Huỷ đơn</option>
                                </select>
                            </div>

                            <div class="col-md-3">

                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                <button type="submit" name="export" value="true" class="btn btn-info">
                                    <i class="fa fa-save"></i> Excel
                                </button>
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
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr style="text-align: center; background-color:cadetblue">
                                        <th style="width: 10px">#Mã ĐH</th>
                                        <th style="width: 30%">Thông tin khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Hình thức</th>
                                        <th>Trạng thái</th>
                                        <th>Xử lý</th>
                                        <th>Hành động</th>
                                    </tr>
                                    @if (isset($transactions))
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td style="text-align: center">{{ $transaction->id }}</td>
                                                <td class="title-content">
                                                    <p><b>KH:</b> {{ $transaction->tst_name }}({{ $transaction->tst_phone }})</p>
                                                    <p><b>Địa chỉ:</b> {{ $transaction->tst_address }}</p>

                                                </td>
                                                <td>{{ number_format($transaction->tst_total_money, 0, ',', '.') }} đ</td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>
                                                    @if ($transaction->payment)
                                                    <span class="btn btn-xs btn-success">Thanh toán VnPay</span> 
                                                    @else
                                                       <span class="btn btn-xs btn-info">Thanh toán khi nhận hàng</span> 
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="label label-{{ $transaction->getStatus($transaction->tst_status)['class'] }} ">
                                                        {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-success btn-xs">Xử lý</button>
                                                        <button type="button"
                                                            class="btn btn-success btn-xs dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li class="divider"></li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('admin.action.transaction', ['process', $transaction->id]) }}"><i class="fa fa-check-square" aria-hidden="true"></i> Đã xác nhận</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.action.transaction', ['cancel', $transaction->id]) }}"><i
                                                                        class="fa fa-trash"></i> Huỷ đơn</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                               <td style="text-align: center">
                                                   <a data-id="{{ $transaction->id }}"
                                                       href="{{ route('ajax.admin.transaction.detail', $transaction->id) }}"
                                                       class="btn btn-xs btn-info js-preview-transaction"><i
                                                           class="fa fa-eye"></i> Chi tiết</a>
                                                    <a href="{{ route('admin.transaction.delete', $transaction->id) }}"
                                                    class=" btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
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
                        {!! $transactions->appends($query)->links() !!}
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
    </section>

    <div class="modal fade fade" id="modal-preview-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Chi tiết đơn hàng <b id="idTransaction"></b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span></button>
                </div>
                <div class="modal-body">
                    <div class="content">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
@endsection
