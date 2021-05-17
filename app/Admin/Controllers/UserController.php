<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models\User as UserModel;
use App\Admin\Actions\Grid\ResetPassword;
use App\Admin\Actions\Grid\UpdateStatus;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->simplePaginate();

            $grid->column('id')->sortable();
            $grid->column('account');
            $grid->column('phone')->copyable();
            $grid->column('mail')->copyable();
            $grid->column('nickname');
            $grid->column('avatarurl')->image(null, 50, 50);
            $grid->column('gender')->using(UserModel::$EnumGender);
            $grid->column('identity')->using(UserModel::$EnumIdentity);
            $grid->column('status')->using(UserModel::$EnumStatus);
            $grid->column('forwarder_id');
            $grid->column('openid');
            $grid->column('unionid');
            $grid->column('created_at');
            $grid->column('updated_at');
            $grid->column('last_login_time');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('account');
                $filter->like('phone');
                $filter->like('mail');
                $filter->like('nickname');
                $filter->equal('gender')->select(UserModel::$EnumGender);
                $filter->equal('identity')->select(UserModel::$EnumIdentity);
                $filter->equal('status')->select(UserModel::$EnumStatus);
                $filter->between('last_login_time')->datetime();
                $filter->between('created_at')->datetime();
            });

            $grid->model()->orderBy('id', 'desc');

            $grid->fixColumns(5, -1);

            $grid->disableCreateButton();
            $grid->disableViewButton();
            $grid->disableDeleteButton();
            $grid->disableEditButton();
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->prepend('<a href="user/address?user_id=1">地址</a>');
            });
            $grid->actions([new ResetPassword()]);
            $grid->actions([new UpdateStatus()]);
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('account');
            $show->field('password');
            $show->field('phone');
            $show->field('mail');
            $show->field('openid');
            $show->field('unionid');
            $show->field('nickname');
            $show->field('avatarurl');
            $show->field('gender');
            $show->field('identity');
            $show->field('status');
            $show->field('forwarder_id');
            $show->field('session_key');
            $show->field('keyword');
            $show->field('last_login_time');
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('account');
            $form->text('password');
            $form->text('phone');
            $form->text('mail');
            $form->text('openid');
            $form->text('unionid');
            $form->text('nickname');
            $form->text('avatarurl');
            $form->text('gender');
            $form->text('identity');
            $form->text('status');
            $form->text('forwarder_id');
            $form->text('session_key');
            $form->text('keyword');
            $form->text('last_login_time');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
