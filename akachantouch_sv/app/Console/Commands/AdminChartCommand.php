<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Core\Models\AdminChart;
use Core\Models\AdminStatistic;
use Core\Models\SpecialUser;
use Core\Models\User;

class AdminChartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin_chart:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'handle data chart admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $new_user_month = AdminStatistic::where('created_at', '>=', Carbon::now()->subDays(30))
            ->where('created_at', '<', Carbon::now())
            ->orderBy('created_at', 'desc')->pluck('new_user')->toArray();

        $access_month = AdminStatistic::where('created_at', '>=', Carbon::now()->subDays(30))
            ->where('created_at', '<', Carbon::now())
            ->orderBy('created_at', 'desc')->pluck('access')->toArray();

        $access_year = AdminStatistic::where('created_at', '>=', Carbon::now()->subMonths(12))
            ->where('created_at', '<', Carbon::now()->subMonth())
            ->selectRaw('SUM(access) as qty_access, DATE_FORMAT(created_at,"%y-%m") as monthyear')
            ->groupBy('monthyear')
            ->orderBy('monthyear', 'desc')
            ->pluck('qty_access')->toArray();

        $user_year = SpecialUser::where('created_at', '>=', Carbon::now()->subMonths(12))
            ->where('created_at', '<', Carbon::now()->subMonth())
            ->selectRaw('COUNT(id) as qty_user, DATE_FORMAT(created_at,"%y-%m") as monthyear')
            ->groupBy('monthyear')
            ->orderBy('monthyear', 'desc')
            ->pluck('qty_user')->toArray();

        $paid_fees_user_year = AdminStatistic::where('created_at', '>=', Carbon::now()->subMonths(12))
            ->where('created_at', '<', Carbon::now()->subMonth())
            ->selectRaw('SUM(paid_fees_user) as qty_user, DATE_FORMAT(created_at,"%y-%m") as monthyear')
            ->groupBy('monthyear')
            ->orderBy('monthyear', 'desc')
            ->pluck('qty_user')->toArray();

        for ($i = 0; $i < 30; $i++) {

            if (!array_key_exists($i, $access_month)) {
                $access_month[$i] = 0;
            }
            if (!array_key_exists($i, $new_user_month)) {
                $new_user_month[$i] = 0;
            }

        }
        for ($i = 0; $i < 12; $i++) {

            if (!array_key_exists($i, $access_year)) {
                $access_year[$i] = 0;
            }
            if (!array_key_exists($i, $user_year)) {
                $user_year[$i] = 0;
            }
            if (!array_key_exists($i, $paid_fees_user_year)) {
                $paid_fees_user_year[$i] = 0;
            }

        }
        $access_month = array_reverse($access_month);
        $new_user_month = array_reverse($new_user_month);
        $access_year = array_reverse($access_year);
        $user_year = array_reverse($user_year);
        $paid_fees_user_year = array_reverse($paid_fees_user_year);

        $used_day = User::selectRaw('DATEDIFF(last_login_at,created_at) as DateDiff')
            ->pluck('DateDiff')->toArray();

        $qtyDayInMonth = 30;
        $average_duration = [0, 0, 0, 0, 0];

        //    1ヶ月、2~3ヶ月、4ヶ月~6ヶ月、7ヶ月~12ヶ月、13ヶ月以

        foreach ($used_day as $key => $value) {

            if ($value <= 30)
                $average_duration[0] += 1;
            elseif (($value > $qtyDayInMonth) && ($value <= $qtyDayInMonth * 3))
                $average_duration[1] += 1;
            elseif (($value > $qtyDayInMonth * 3) && ($value <= $qtyDayInMonth * 6))
                $average_duration[2] += 1;
            elseif (($value > $qtyDayInMonth * 6) && ($value <= $qtyDayInMonth * 12))
                $average_duration[3] += 1;
            elseif (($value > $qtyDayInMonth * 12))
                $average_duration[4] += 1;
        }

        $admin_chart = new AdminChart();
        $admin_chart->new_user_month = implode(',', $new_user_month);
        $admin_chart->access_month = implode(',', $access_month);
        $admin_chart->access_year = implode(',', $access_year);
        $admin_chart->user_year = implode(',', $user_year);
        $admin_chart->paid_fees_user_year = implode(',', $paid_fees_user_year);
        $admin_chart->average_duration = implode(',', $average_duration);
        $admin_chart->save();

    }
}
