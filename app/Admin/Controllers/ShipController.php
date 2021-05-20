<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Ship;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ShipController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Ship(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('name_abbr');
            $grid->column('name_en');
            $grid->column('name_en_abbr');
            $grid->column('sort');
            $grid->column('status');
            $grid->column('website');
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
        return Show::make($id, new Ship(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('name_abbr');
            $show->field('name_en');
            $show->field('name_en_abbr');
            $show->field('sort');
            $show->field('status');
            $show->field('website');
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
        return Form::make(new Ship(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('name_abbr');
            $form->text('name_en');
            $form->text('name_en_abbr');
            $form->text('sort');
            $form->text('status');
            $form->text('website');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
