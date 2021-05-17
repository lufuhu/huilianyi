<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Address;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class AddressController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Address(), function (Grid $grid) {
            $grid->simplePaginate();

            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('name')->copyable();
            $grid->column('phone')->copyable();
            $grid->column('address')->copyable();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('user_id');
                $filter->like('name');
                $filter->like('phone');
                $filter->like('address');
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
        return Show::make($id, new Address(), function (Show $show) {
            $show->field('id');
            $show->field('address');
            $show->field('name');
            $show->field('phone');
            $show->field('user_id');
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
        return Form::make(new Address(), function (Form $form) {
            $form->display('id');
            $form->text('address');
            $form->text('name');
            $form->text('phone');
            $form->text('user_id');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
