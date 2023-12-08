@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Trang quản trị</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản trị</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thống kê</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3>{{ $totalTransactions }}</h3>
                
                                <p>Tổng số đơn hàng</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="{{ route('admin.transaction.index') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3>{{ $totalUsers }}</h3>
                
                                <p>Thành viên</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="{{ route('admin.user.index') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                              <div class="inner">
                                <h3 style="color: #FFF">{{ $totalProducts }} </h3>
                
                                <p style="color: #FFF">Sản phẩm</p>
                              </div>
                              <div class="icon" style="color: #FFF">
                                <i class="ion ion-bag" ></i>
                              </div>
                              <a href="{{ route('admin.product.index') }}" class="small-box-footer"><span style="color: #FFF">Chi tiết</span>  <i class="fas fa-arrow-circle-right" style="color: #FFF"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3>{{ $totalRatings }}</h3>
                
                                <p>Đánh giá</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="{{ route('admin.rating.index') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3>{{ number_format($totalMoneyDay) }} <small>đ</small></h3>
                
                                <p>Doanh thu ngày</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3>{{ number_format($totalMoneyWeed) }} <small>đ</small></h3>
                
                                <p>Doanh thu tuần</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                              <div class="inner">
                                <h3 style="color: #FFF">{{ number_format($totalMoneyMonth) }} <small>đ</small></h3>
                
                                <p style="color: #FFF">Doanh thu tháng</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3>{{ number_format($totalMoneyYear) }} <small>đ</small></h3>
                
                                <p>Doanh thu năm</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="card-body">
                        <h3>Sản phẩm bán chạy</h3>
                        <div>
                            <table style="border-collapse: collapse; width: 100%; height: 68px;" border="1">
                                <tbody>
                                    <tr style="height: 17px;">
                                        <td style="width: 33.3333%; text-align: center; height: 17px;"><strong><em>Id
                                                    </em></strong></td>
                                        <td style="width: 33.3333%; text-align: center; height: 17px;"><strong><em>Tên 
                                                    sản phẩm</em></strong></td>
                                        <td style="width: 33.3333%; text-align: center; height: 17px;"><strong><em>Số lượng bán
                                                    </em></strong></td>
                                    </tr>
                                    @foreach ($topPayProducts as $item)
                                    <tr style="height: 17px;">
                                        <td style="width: 33.3333%; text-align: center; height: 17px;">
                                        </td>
                                        <td style="width: 33.3333%; text-align: center; height: 17px;">
                                            {{ $item->pro_name }}
                                        </td>
                                        <td style="width: 33.3333%; text-align: center; height: 17px;">
                                            {{ $item->pro_pay }}
                                        </td>
                                    </tr>
                                    @endforeach
                        </div>
                        </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>

        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Biểu đồ thống kê doanh thu</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- /.row -->
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-sm-12">
                            <figure class="highcharts-figure">
                                <div id="container2" data-list-day="{{ $listDay }}"
                                    data-money-default={{ $arrRevenueTransactionMonthDefault }}
                                    data-money={{ $arrRevenueTransactionMonth }}>
                                </div>
                            </figure>
                        </div>
                        <div class="col-sm-4" hidden>
                            <figure class="highcharts-figure">
                                <div id="container" data-json="{{ $statusTransaction }}"></div>
                            </figure>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-sm-12">
                            <figure class="highcharts-figure">
                                <div id="container3" data-list-day="{{ $listDay }}" data-money-default={{ $arrRevenueTransactionMonthDefault }} data-money={{ $arrRevenueTransactionMonth }}>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Danh sách đơn hàng mới</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thông tin</th>
                                    <th>Tổng tiền</th>
                                    <th>Account</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>
                                            <ul>
                                                <li>Name: {{ $transaction->tst_name }}</li>
                                                <li>Email: {{ $transaction->tst_email }}</li>
                                                <li>Phone: {{ $transaction->tst_phone }}</li>
                                            </ul>
                                        </td>
                                        <td>{{ number_format($transaction->tst_total_money,0,',','.') }} đ</td>
                                        <td>
                                            @if ($transaction->tst_user_id)
                                                <span class="btn btn-sm btn-success">Thành viên</span>
                                            @else
                                                <span class="btn btn-sm btn-default">Khách</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="btn btn-sm btn-{{ $transaction->getStatus($transaction->tst_status)['class'] }}">
                                                {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                                            </span>
                                        </td>
                                        <td>{{  $transaction->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


@endsection

@section('script')
    {{-- <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css"> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}
    {{-- <script src="https://code.highcharts.com/modules/export-data.js"></script> --}}
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        let dataTransaction = $("#container").attr('data-json');
        dataTransaction = JSON.parse(dataTransaction);

        let listday = $("#container2").attr("data-list-day");
        listday = JSON.parse(listday);

        let listMoneyMonth = $("#container2").attr('data-money');
        listMoneyMonth = JSON.parse(listMoneyMonth);

        let listday2 = $("#container3").attr("data-list-day");
        listday2 = JSON.parse(listday2);

        let listMoneyMonthDefault = $("#container2").attr('data-money-default');
        listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);

        Highcharts.chart('container', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Thống kê trạng thái đơn hàng'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataTransaction,
                showInLegend: true
            }]
        });

        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu các ngày trong tháng'
            },
            subtitle: {
                text: 'Doanh thu các ngày'
            },
            xAxis: {
                categories: listday
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function() {
                        return this.value + 'vnđ';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                    name: 'Đã xử lý',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonth
                },
                {
                    name: 'Chưa xử lý',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonthDefault
                }
            ]
        });

        Highcharts.chart('container3', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Thống kê Doanh thu trong tháng'
            },
            subtitle: {
                text: 'Dữ liệu thống kê'
            },
            xAxis: {
                categories: listday2
            },
            yAxis: {
                title: {
                    text: 'Tiền'
                },
                // number_format($totalPrice, 0,',','.') 
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                    name: 'Doanh thu',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonth2
                },

            ]
        });
    </script>
@endsection
