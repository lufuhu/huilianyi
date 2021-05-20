<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Country;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class CountryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Country(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('code');
            $grid->column('name_en');
            $grid->column('code_three');
            $grid->column('code_num');
            $grid->column('name_full');
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
        return Show::make($id, new Country(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('code');
            $show->field('name_en');
            $show->field('code_three');
            $show->field('code_num');
            $show->field('name_full');
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
        return Form::make(new Country(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('code');
            $form->text('name_en');
            $form->text('code_three');
            $form->text('code_num');
            $form->text('name_full');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
