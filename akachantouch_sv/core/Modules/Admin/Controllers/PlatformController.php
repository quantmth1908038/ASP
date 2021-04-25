<?php

namespace Core\Modules\Admin\Controllers;

use Core\Models\Platform;
use Encore\Admin\Controllers\HasResourceActions;
use Core\Modules\Admin\Classes\AdminForm as Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Routing\Controller;

class PlatformController extends Controller
{
    use HasResourceActions;

    protected $header;
    protected $model;

    function __construct()
    {
        $this->header = 'Platform';
        $this->model = new Platform();
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
        $grid->name('Name');
        $grid->comment('Comment');
        $grid->created_at(trans('admin.created_at'))->sortable();
        $grid->updated_at(trans('admin.updated_at'));

        $grid->filter(function($filter) {
            $filter->like('name');
            $filter->like('comment');
            $filter->between('created_at')->datetime(['format' => 'YYYY-MM-DD']);
        });

        $grid->model()->orderBy('created_at', 'desc');
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
        $show->name('Name');;
        $show->comment('Comment');
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
        $form->text('name', 'Name')->rules('required');
        $form->text('comment', 'Comment');
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }
}
