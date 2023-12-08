<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thông tin thanh toán</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/vnpay/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('/vnpay/jumbotron-narrow.css') }}" rel="stylesheet">
    <script src="{{ asset('/vnpay_php/jquery-1.11.3.min.js') }}"></script>
</head>
<style>
    table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
</style>
<body>
<!--Begin display -->
<div class="container">
    <div class="header clearfix">
        <img alt="Image" src="https://www.bessvietnam.vn/wp-content/uploads/2023/02/check.png"  style="width:10%; margin-left:425px" />
        <h3 class="text-muted text-center">Thanh toán thành công</h3>
    </div>
    <table style="margin-left:230px">
        <tr>
            <th>Mục</th>
            <th>Thông tin</th>
        </tr>
        <tr>
            <td>Mã đơn hàng: </td>
            <td>{{ $vnpayData['vnp_TxnRef'] }}</td>
        </tr>
        <tr>
            <td>Số tiền:</td>
            <td>{{ number_format($vnpayData['vnp_Amount'] / 100,0,',','.') }} VNĐ</td>
        </tr>
        <tr>
            <td>Nội dung thanh toán:</td>
            <td>{{ $vnpayData['vnp_OrderInfo'] }}</td>
        </tr>
        <tr>
            <td>Thời gian thanh toán:</td>
            <td>{{ date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate'])) }}</td>
        </tr>
    </table>
    <p>
        &nbsp;
    </p>
    <a href="{{ route('get.home') }}" style="margin-left:390px">
        <button>Quay về trang mua hàng</button>
    </a>
    <p>
        &nbsp;
    </p>
    <footer class="footer">
        <p>&copy; VNPAY 2023</p>
    </footer>
</div>
</body>
</html>