<?php

namespace Core\Modules\Admin\Controllers;

use Core\Models\Platform;
use Core\Models\User;
use Core\Modules\Admin\Classes\AdminForm as Form;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    use HasResourceActions;
    protected $model;
    protected $header;

    function __construct()
    {
        $this->header = 'User List';
        $this->model = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->header)
            ->description('List')
            ->body($this->grid()->render());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Content $content)
    {
        return $content
            ->header($this->header)
            ->description('Create')
            ->body($this->form());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Content $content)
    {
        return $content
            ->header($this->header)
            ->description('View')
            ->body($this->detail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header($this->header)
            ->description('Edit')
            ->body($this->form()->edit($id));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function grid()
    {
        $grid = new Grid($this->model);
        $grid->id('ID')->sortable();
        $grid->name('Name')->sortable();
        $grid->platform()->name('Platform')->sortable();
        $grid->column('subscription.free_date', 'Free expiration date')->sortable();
        $grid->column('subscription.expires_date', 'Expires date')->sortable();
        $grid->created_at(trans('admin.created_at'))->sortable();
        $grid->updated_at(trans('admin.updated_at'));
        $grid->filter(function($filter) {
            $filter->like('name', 'Name');
            $filter->like('email', 'Email');
            $filter->equal('platform.id', 'Platform')->select(function () {
                $options = [];
                $datas = Platform::all();

                if ($datas) {
                    foreach ($datas as $data) {
                        $options[$data->id] = $data->name;
                    }
                }

                return $options;
            });
            $filter->between('created_at')->datetime(['format' => 'YYYY-MM-DD']);
            $filter->between('updated_at')->datetime(['format' => 'YYYY-MM-DD']);
        });
        $grid->model()->orderBy('id', 'desc');
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
        $show->name('Name');
        $show->uuid();
        $show->field('platform.name', 'Platform');
        $show->version('Version');
        $show->last_login_at();
        $show->field('subscription.free_date', 'Free date');
        $show->field('subscription.expires_date', 'Expires date');
        // $show->device_token();
        $show->sdk_id('Device Identifier');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));
        $show->delete_at();

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
        $form->text('name','Name');
        $form->text('email','Email');
        $form->select('platform_id', 'Platform')
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
        $form->datetime('subscription.free_date', 'Free Date')->format('YYYY-MM-DD HH:mm')->options(['stepping' => 10])->rules('required');
        $form->datetime('subscription.expires_date', 'Expires Date')->format('YYYY-MM-DD HH:mm')->options(['stepping' => 10])->rules('required');
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }

}
