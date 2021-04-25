<?php

namespace Core\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Core\Models\AdminChart;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $data = AdminChart::all()->last();
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(view('Admin::charts.Dashboard',$data));
    }
}
