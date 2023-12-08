<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>iPhone Interface</title>
    <style>
        body {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
}

.iphone {
  position: relative;
  width: 375px;
  height: 667px;
  border: 16px solid #f0f0f0;
  border-radius: 36px;
  overflow: hidden;
  background: #fff;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.status-bar {
  height: 20px;
  background: #f0f0f0;
}

.app-header {
  height: 44px;
  background: #f0f0f0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
}

.app-title {
  font-size: 18px;
}

.screen {
  width: 100%;
  height: calc(100% - 64px);
  background: #f2f2f2;
  overflow: hidden;
}

.home-button {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 60px;
  background: #f0f0f0;
  border-radius: 50%;
  border: 4px solid #ccc;
}

    </style>
</head>
<body>
    <div class="iphone">
        <div class="status-bar"></div>
        <div class="app-header">
            <span class="app-title">App Shipper</span>
        </div>
        <div class="screen">
            <table class="table table-hover text-nowrap table-bordered">
                <thead>
                    <tr style="text-align: center; background-color:cadetblue">
                        <th style="width: 10px">#Mã ĐH</th>
                        <th style="width: 30%">Thông tin khách hàng</th>
                        <th>Tổng tiền</th>
                        {{-- <th>Ngày đặt hàng</th>
                        <th>Hình thức</th>
                        <th>Trạng thái</th>--}}
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
                                {{-- <td>{{ $transaction->created_at }}</td>
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
                                </td> --}}
                                <td>
                                    <div class="btn-group">
                                        {{-- <button type="button"
                                            class="btn btn-success btn-xs">Xử lý</button>
                                        <button type="button"
                                            class="btn btn-success btn-xs dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button> --}}
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a
                                                    href="{{ route('admin.action.transaction', ['success', $transaction->id]) }}"><i
                                                        class="fa fa-check-square"></i> Đã giao hàng</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.action.transaction', ['cancel', $transaction->id]) }}"><i
                                                        class="fa fa-trash"></i> Huỷ đơn</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                               {{-- <td style="text-align: center">
                                   <a data-id="{{ $transaction->id }}"
                                       href="{{ route('ajax.admin.transaction.detail', $transaction->id) }}"
                                       class="btn btn-xs btn-info js-preview-transaction"><i
                                           class="fa fa-eye"></i> Chi tiết</a>
                                    <a href="{{ route('admin.transaction.delete', $transaction->id) }}"
                                    class=" btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i></a>
                               </td> --}}
                                
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
            </table>
        </div>
        <div class="home-button"></div>
    </div>
</body>
</html>
