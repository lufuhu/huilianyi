<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Config;
use App\Models\Config as ConfigModel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ConfigController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Config(), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('key');
            $grid->column('value');
            $grid->column('type')->using(ConfigModel::getValue('configs_type'));
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
        return Show::make($id, new Config(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('key');
            $show->field('value');
            $show->field('type')->using(ConfigModel::getValue('configs_type'));
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
        return Form::make(new Config(), function (Form $form) {
            $form->text('title');
            $form->text('key');
            $form->textarea('value');
            $form->select('type')->options(ConfigModel::getValue('configs_type'));
        });
    }
}
