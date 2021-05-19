<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Order(), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->model()->orderBy('id', 'desc');

            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('to');
            $grid->column('from');
            $grid->column('price');
            $grid->column('info_type');
            $grid->column('time');
            $grid->column('express_company');
            $grid->column('insurance');
            $grid->column('customs');
            $grid->column('revenue');
            $grid->column('clause');
            $grid->column('remark');
            $grid->column('consignee_type');
            $grid->column('consignee_name');
            $grid->column('consignee_tel');
            $grid->column('consignee_address');
            $grid->column('addresser_type');
            $grid->column('addresser_date');
            $grid->column('addresser_name');
            $grid->column('addresser_tel');
            $grid->column('addresser_address');
            $grid->column('order_parcel_id');
            $grid->column('forwarder_id');
            $grid->column('forwarder_task_id');
            $grid->column('status');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('user_id');

            });

            $grid->fixColumns(5, -1);
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
        return Show::make($id, new Order(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('to');
            $show->field('from');
            $show->field('price');
            $show->field('info_type');
            $show->field('time');
            $show->field('express_company');
            $show->field('insurance');
            $show->field('customs');
            $show->field('revenue');
            $show->field('clause');
            $show->field('remark');
            $show->field('consignee_type');
            $show->field('consignee_name');
            $show->field('consignee_tel');
            $show->field('consignee_address');
            $show->field('addresser_type');
            $show->field('addresser_date');
            $show->field('addresser_name');
            $show->field('addresser_tel');
            $show->field('addresser_address');
            $show->field('order_parcel_id');
            $show->field('forwarder_id');
            $show->field('forwarder_task_id');
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
        return Form::make(new Order(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('to');
            $form->text('from');
            $form->text('price');
            $form->text('info_type');
            $form->text('time');
            $form->text('express_company');
            $form->text('insurance');
            $form->text('customs');
            $form->text('revenue');
            $form->text('clause');
            $form->text('remark');
            $form->text('consignee_type');
            $form->text('consignee_name');
            $form->text('consignee_tel');
            $form->text('consignee_address');
            $form->text('addresser_type');
            $form->text('addresser_date');
            $form->text('addresser_name');
            $form->text('addresser_tel');
            $form->text('addresser_address');
            $form->text('order_parcel_id');
            $form->text('forwarder_id');
            $form->text('forwarder_task_id');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
