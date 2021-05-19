<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Forwarder;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ForwarderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Forwarder(), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('monthly');
            $grid->column('guarantee');
            $grid->column('cargo');
            $grid->column('level');
            $grid->column('sort');
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
        return Show::make($id, new Forwarder(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('monthly');
            $show->field('guarantee');
            $show->field('cargo');
            $show->field('level');
            $show->field('sort');
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
        return Form::make(new Forwarder(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('monthly');
            $form->text('guarantee');
            $form->text('cargo');
            $form->text('level');
            $form->text('sort');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
