<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Core\Models\AdminStatistic;
use Core\Models\User;
use Core\Models\SpecialUser;

class AdminStatisticCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin_statistic:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'statistic new user, user access, user paid fees, user normal  every day';

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
        //count new user
        $new_user = User::where('created_at', '>=', Carbon::now()->subDay())->count();

        $access = User::where('last_login_at', '>=', Carbon::now()->subDay())->count();

        $paid_fees_user = SpecialUser::where('flg', 'like', 'paid')
            ->where('updated_at', '>=', Carbon::now()->subDay())->count();

        $normal_user = SpecialUser::where('flg', 'like', 'free')
            ->orWhere('flg', 'like', 'expires')
            ->where('updated_at', '>=', Carbon::now()->subDay())->count();

        $statistic = new AdminStatistic();
        $statistic->new_user = $new_user;
        $statistic->access = $access;
        $statistic->paid_fees_user = $paid_fees_user;
        $statistic->normal_user = $normal_user;

        $statistic->save();
    }
}
