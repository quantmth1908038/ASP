<?php

namespace Core\Modules\Admin\Controllers;

use Core\Models\Purchase;
use Core\Models\User;
use Core\Models\Platform;
use Encore\Admin\Controllers\HasResourceActions;
use Core\Modules\Admin\Classes\AdminForm as Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Routing\Controller;

class PurchaseController extends Controller
{
    use HasResourceActions;

    protected $header;
    protected $model;

    function __construct()
    {
        $this->header = 'Purchase';
        $this->model = new Purchase();
    }

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->header)
            ->description('List')
            ->body($this->grid()->render());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header($this->header)
            ->description('View')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header($this->header)
            ->description('Edit')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header($this->header)
            ->description('Create')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid($this->model);

        $grid->id('ID')->sortable();
        $grid->user_id('User ID')->sortable();
        $grid->user('User')->display(function ($data) {
            return $data['name'];
        })->sortable();
        $grid->platform('Platform')->display(function ($data) {
            return $data['name'];
        })->sortable();
        $grid->product_code('Product Code')->sortable();
        $grid->order_id('Order ID')->sortable();
        $grid->transaction_id('Transaction')->sortable();
        $grid->expires_date("Expire Date")->sortable();
        $grid->propaty_code('Propaty Code')->display(function ($code) {
            $label ='';
            switch ($code) {
                case config('purchase.PROPATY_ANDROID_SUCCESS'):
                case config('purchase.PROPATY_IOS_SUCCESS'):
                    $label = 'Success';
                    break;
                case config('purchase.PROPATY_ANDROID_FAILURE'):
                case config('purchase.PROPATY_IOS_FAILURE'):
                    $label = 'Failure';
                    break;
                case config('purchase.PROPATY_IOS_DUPLICATION'):
                case config('purchase.PROPATY_ANDROID_DUPLICATION'):
                    $label = 'Multiple Failures';
                    break;
            }
            return $label;
        });
        $grid->created_at(trans('admin.created_at'))->sortable();
        $grid->updated_at(trans('admin.updated_at'));

        $grid->filter(function($filter) {
            $filter->equal('user_id', 'User ID');
            $filter->where(function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('name', 'like', "%{$this->input}%");
                });
            }, 'User');
            $filter->where(function ($query) {
                $query->whereHas('platform', function ($query) {
                    $query->where('name', 'like', "%{$this->input}%");
                });
            }, 'Platform');
            $filter->like('product_code', 'Product Code');
            $filter->like('signature', 'Signature');
            $filter->like('order_id', 'Order ID');
            $filter->like('receipt', 'Receipt');
            $filter->like('propaty_code', 'Propaty Code');
        });

        $grid->paginate(50);
        $grid->perPages([50, 100, 200]);

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show($this->model->findOrFail($id));

        $show->id('ID');
        $show->field('user.name', 'User');
        $show->field('platform.name', 'Platform');
        $show->product_code('Product Code');
        $show->receipt('Receipt');
        $show->signature('Signature');
        $show->order_id('Order ID')->sortable();
        $show->transaction_id('Transaction')->sortable();
        $show->json_data('Json data');
        $show->expires_date('Expire Date');
        $show->propaty_code('Propaty Code')->sortable();
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        $form = new Form($this->model);

        $form->display('id', 'ID');

        $form->select('user_id', 'User')->rules('required')
            ->options(function () {
                $options = [];
                $users = User::all();

                if ($users) {
                    foreach ($users as $user) {
                        $options[$user->id] = $user->name;
                    }
                }

                return $options;
            });
        $form->select('platform_id', 'Platform')->rules('required')
            ->options(function () {
                $options = [];
                $platforms = Platform::all();

                if ($platforms) {
                    foreach ($platforms as $platform) {
                        $options[$platform->id] = $platform->name;
                    }
                }

                return $options;
            });
        $form->text('product_code','Product Code')->rules('required');
        $form->text('receipt','Receipt');
        $form->text('transaction_id','Transaction id');
        $form->text('signature','Signature');
        $form->text('order_id','Order id');
        $form->text('json_data','Json data');
        $form->text('propaty_code','Propaty Code');
        $form->datetime('expires_date', 'Expire Date')->rules('required');
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }
}
