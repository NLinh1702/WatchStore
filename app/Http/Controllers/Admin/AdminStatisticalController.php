<?php

namespace App\Http\Controllers\Admin;

use App\HelpersClass\Date;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;

class AdminStatisticalController extends Controller
{
    public function index(Request $request)
    {
        //Tổng hđơn hàng
        $totalTransactions = \DB::table('transactions')->select('id')->count();

        //Tổng thành viên
        $totalUsers = \DB::table('users')->select('id')->count();

        // Tông sản phẩm
        $totalProducts = \DB::table('products')->select('id')->count();


        // Tông đánh giá
        $totalRatings = \DB::table('ratings')->select('id')->count();

        // Danh sách đơn hàng mới
        $transactions = Transaction::orderByDesc('id')
            ->limit(10)
            ->get();

        // Top sản phẩm xem nhiều
        $topViewProducts = Product::orderByDesc('pro_view')
            ->limit(10)
            ->get();

        // Top sản phẩm mua nhiều
        $topPayProducts = Product::orderByDesc('pro_pay')
            ->limit(10)
            ->get();


        // Doanh thu ngày
        $totalMoneyDay = Transaction::whereDay('created_at', date('d'))->where('tst_status', Transaction::STATUS_SUCCESS)
            ->sum('tst_total_money');

        // Doanh thu tuần
        $mondatLast = Carbon::now()->startOfWeek();
        $sundayFirst = Carbon::now()->endOfWeek();

        $totalMoneyWeed = Transaction::whereBetween('created_at', [$mondatLast, $sundayFirst])
            ->where('tst_status', Transaction::STATUS_SUCCESS)->sum('tst_total_money');


        // Thống kê trạng thái đơn hàng
        // Tiep nhan
        $transactionDefault = Transaction::where('tst_status', 1)->select('id')->count();
        // dang van chuyen
        $transactionProcess = Transaction::where('tst_status', 2)->select('id')->count();
        // Thành công
        $transactionSuccess = Transaction::where('tst_status', 3)->select('id')->count();
        //Cancel
        $transactionCancel = Transaction::where('tst_status', -1)->select('id')->count();

        $statusTransaction = [
            [
                'Hoàn tất', $transactionSuccess, false
            ],
            [
                'Đang vận chuyển', $transactionProcess, false
            ],
            [
                'Tiếp nhận', $transactionDefault, false
            ],
            [
                'Huỷ bỏ', $transactionCancel, false
            ]
        ];

        $listDay = Date::getListDayInMonth();
        // $ListDay = Date::getListDayInMonth();
        $month = $request->select_month ? $request->select_month : date('m');
        $year = $request->select_year ? $request->select_year : date('Y');
        $listDay = Date::getListDayInMonth($month, $year);

        //Doanh thu theo tháng ứng với trạng thái đã xử lý
        $revenueTransactionMonth = Transaction::where('tst_status', 3)
            ->whereMonth('created_at', date('m'))
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        //Doanh thu theo tháng ứng với trạng thái tiếp nhận
        $revenueTransactionMonthDefault = Transaction::where('tst_status', 1)
            ->whereMonth('created_at', date('m'))
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        $money = Transaction::where('tst_status', 3)
            ->whereMonth('created_at', date('m'))
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('MONTH(created_at) Month'))
            ->groupBy('Month')
            ->get()->toArray();

        //Doanh thu tháng
        $totalMoneyMonth = Transaction::whereMonth('created_at', date('m'))
            ->where('tst_status', Transaction::STATUS_SUCCESS)
            ->sum('tst_total_money');

        //Doanh thu năm
        $totalMoneyYear = Transaction::whereYear('created_at', date('Y'))
            ->where('tst_status', Transaction::STATUS_SUCCESS)
            ->sum('tst_total_money');

        $arrRevenueTransactionMonth = [];
        $arrRevenueTransactionMonthDefault = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenueTransactionMonth as $key => $revenue) {
                if ($revenue['day'] ==  $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }

            $arrRevenueTransactionMonth[] = (int)$total;

            $total = 0;
            foreach ($revenueTransactionMonthDefault as $key => $revenue) {
                if ($revenue['day'] ==  $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueTransactionMonthDefault[] = (int)$total;
        }


        $viewData = [
            'totalTransactions'          => $totalTransactions,
            'totalUsers'                 => $totalUsers,
            'totalProducts'              => $totalProducts,
            'totalRatings'               => $totalRatings,
            'totalMoneyDay'              => $totalMoneyDay,
            'totalMoneyWeed'             => $totalMoneyWeed,
            'totalMoneyMonth'            => $totalMoneyMonth,
            'totalMoneyYear'             => $totalMoneyYear,
            'transactions'               => $transactions,
            'topViewProducts'            => $topViewProducts,
            'topPayProducts'             => $topPayProducts,
            'statusTransaction'          => json_encode($statusTransaction),
            'listDay'                    => json_encode($listDay),
            'arrRevenueTransactionMonth' => json_encode($arrRevenueTransactionMonth),
            'arrRevenueTransactionMonthDefault' => json_encode($arrRevenueTransactionMonthDefault),
            // 'arrmoney' => json_encode($arrmoney),
        ];

        return view('admin.statistical.index', $viewData);
    }
}
