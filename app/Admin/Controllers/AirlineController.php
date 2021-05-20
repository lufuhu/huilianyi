<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Airline;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class AirlineController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Airline(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('code');
            $grid->column('code_three');
            $grid->column('name');
            $grid->column('name_en');
            $grid->column('status');
            $grid->column('type');
            $grid->column('waybill');
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
        return Show::make($id, new Airline(), function (Show $show) {
            $show->field('id');
            $show->field('code');
            $show->field('code_three');
            $show->field('name');
            $show->field('name_en');
            $show->field('status');
            $show->field('type');
            $show->field('waybill');
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
        return Form::make(new Airline(), function (Form $form) {
            $form->display('id');
            $form->text('code');
            $form->text('code_three');
            $form->text('name');
            $form->text('name_en');
            $form->text('status');
            $form->text('type');
            $form->text('waybill');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
