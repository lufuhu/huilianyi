<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ForwarderTask;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ForwarderTaskController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ForwarderTask(), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('forwarder_id');
            $grid->column('title');
            $grid->column('from');
            $grid->column('to');
            $grid->column('transportation');
            $grid->column('min_time');
            $grid->column('max_time');
            $grid->column('guarantee');
            $grid->column('cargo');
            $grid->column('base_price');
            $grid->column('base_weight');
            $grid->column('price');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });

            $grid->fixColumns(7, -1);
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
        return Show::make($id, new ForwarderTask(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('forwarder_id');
            $show->field('title');
            $show->field('from');
            $show->field('to');
            $show->field('transportation');
            $show->field('min_time');
            $show->field('max_time');
            $show->field('guarantee');
            $show->field('cargo');
            $show->field('base_price');
            $show->field('base_weight');
            $show->field('price');
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
        return Form::make(new ForwarderTask(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('forwarder_id');
            $form->text('title');
            $form->text('from');
            $form->text('to');
            $form->text('transportation');
            $form->text('min_time');
            $form->text('max_time');
            $form->text('guarantee');
            $form->text('cargo');
            $form->text('base_price');
            $form->text('base_weight');
            $form->text('price');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
