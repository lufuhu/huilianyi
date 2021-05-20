<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\FbaStorage;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class FbaStorageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new FbaStorage(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('address');
            $grid->column('area');
            $grid->column('city');
            $grid->column('code');
            $grid->column('country');
            $grid->column('country_code');
            $grid->column('state');
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
        return Show::make($id, new FbaStorage(), function (Show $show) {
            $show->field('id');
            $show->field('address');
            $show->field('area');
            $show->field('city');
            $show->field('code');
            $show->field('country');
            $show->field('country_code');
            $show->field('state');
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
        return Form::make(new FbaStorage(), function (Form $form) {
            $form->display('id');
            $form->text('address');
            $form->text('area');
            $form->text('city');
            $form->text('code');
            $form->text('country');
            $form->text('country_code');
            $form->text('state');
            $form->text('status');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
