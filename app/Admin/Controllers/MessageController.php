<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Message;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class MessageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Message(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('admin_id');
            $grid->column('title');
            $grid->column('img')->image(null, 50, 50);
            $grid->column('content');
            $grid->column('type');
            $grid->column('status');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
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
        return Show::make($id, new Message(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('admin_id');
            $show->field('title');
            $show->field('img')->image(null, 50, 50);;
            $show->field('content');
            $show->field('type');
            $show->field('status');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Message(), function (Form $form) {
            $form->text('title');
            $form->multipleImage('img')->sortable()->uniqueName()->saveFullUrl()->autoUpload();
            $form->textarea('content');
            $form->text('type');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
