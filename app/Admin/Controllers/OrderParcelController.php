<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\OrderParcel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderParcelController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new OrderParcel(), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->model()->orderBy('id', 'desc');

            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('order_id');
            $grid->column('title');
            $grid->column('type');
            $grid->column('pack_type');
            $grid->column('long');
            $grid->column('width');
            $grid->column('height');
            $grid->column('weight');
            $grid->column('long_all');
            $grid->column('width_all');
            $grid->column('height_all');
            $grid->column('weight_all');
            $grid->column('num');
            $grid->column('pack');
            $grid->column('container');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('user_id');
                $filter->equal('order_id');

            });

            $grid->fixColumns(4, -1);
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
        return Show::make($id, new OrderParcel(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('order_id');
            $show->field('title');
            $show->field('type');
            $show->field('pack_type');
            $show->field('long');
            $show->field('width');
            $show->field('height');
            $show->field('weight');
            $show->field('long_all');
            $show->field('width_all');
            $show->field('height_all');
            $show->field('weight_all');
            $show->field('num');
            $show->field('pack');
            $show->field('container');
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
        return Form::make(new OrderParcel(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('order_id');
            $form->text('title');
            $form->text('type');
            $form->text('pack_type');
            $form->text('long');
            $form->text('width');
            $form->text('height');
            $form->text('weight');
            $form->text('long_all');
            $form->text('width_all');
            $form->text('height_all');
            $form->text('weight_all');
            $form->text('num');
            $form->text('pack');
            $form->text('container');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
