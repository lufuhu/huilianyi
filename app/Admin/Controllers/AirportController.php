<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Airport;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class AirportController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Airport(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('city');
            $grid->column('code');
            $grid->column('code_four');
            $grid->column('country');
            $grid->column('country_code');
            $grid->column('name');
            $grid->column('name_en');
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
        return Show::make($id, new Airport(), function (Show $show) {
            $show->field('id');
            $show->field('city');
            $show->field('code');
            $show->field('code_four');
            $show->field('country');
            $show->field('country_code');
            $show->field('name');
            $show->field('name_en');
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
        return Form::make(new Airport(), function (Form $form) {
            $form->display('id');
            $form->text('city');
            $form->text('code');
            $form->text('code_four');
            $form->text('country');
            $form->text('country_code');
            $form->text('name');
            $form->text('name_en');
            $form->text('status');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
