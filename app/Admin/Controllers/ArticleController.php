<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Article;
use App\Models\Article as ArticleModel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ArticleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Article(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title')->width('100px');
            $grid->column('type')->using(ArticleModel::$EnumType);
            $grid->column('pid');
            $grid->column('sort')->sortable();
            $grid->column('status')->using(ArticleModel::$EnumStatus);
            $grid->column('image')->image(null, 100, 50);
            $grid->column('url');
            $grid->column('content')
                ->if(function ($column) {
                    return $column->getValue();
                })
                ->then(function (Grid\Column $column) {
                    $column->display('查看')
                        ->modal(function ($modal) {
                            $modal->title($this->title);
                            return "<div style='overflow: auto'>$this->content</div>";
                        });
                })
                ->else(function (Grid\Column $column) {
                    $column->display('');
                });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('title');
                $filter->equal('pid');
                $filter->equal('type')->select(ArticleModel::$EnumType);
                $filter->equal('status')->select(ArticleModel::$EnumStatus);
                $filter->like('url');
                $filter->between('created_at');
            });

            $grid->fixColumns(3, -1);
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
        return Show::make($id, new Article(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('pid');
            $show->field('type')->using(ArticleModel::$EnumType);
            $show->field('image')->image(null, 100, 50);
            $show->field('url');
            $show->field('content');
            $show->field('sort');
            $show->field('status')->using(ArticleModel::$EnumStatus);
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
        return Form::make(new Article(), function (Form $form) {
            $form->text('title');
            $form->select('pid')->options(ArticleModel::getPluckList());
            $form->select('type')->options(ArticleModel::$EnumType);
            $form->image('image');
            $form->text('url');
            $form->text('content');
            $form->number('sort');
            $form->select('status')->options(ArticleModel::$EnumStatus);
        });
    }
}
