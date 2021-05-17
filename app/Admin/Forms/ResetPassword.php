<?php

namespace App\Admin\Forms;

use App\Models\User;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Contracts\LazyRenderable;
use Illuminate\Support\Facades\Hash;

class ResetPassword extends Form implements LazyRenderable
{
    use LazyWidget; // 使用异步加载功能

    // 处理请求
    public function handle(array $input)
    {
        // 获取外部传递参数
        $id = $this->payload['id'] ?? null;

        // 表单参数
        $password = $input['password'] ?? null;

        if (! $id) {
            return $this->response()->error('参数错误');
        }

        $user = User::query()->find($id);

        if (! $user) {
            return $this->response()->error('用户不存在');
        }

        $user->update(['password' => Hash::make($password)]);

        return $this->response()->success('密码修改成功')->refresh();
    }

    public function form()
    {
        // 获取外部传递参数
        //$id = $this->payload['id'] ?? null;

        $this->text('password')->required();
        // 密码确认表单
        $this->text('password_confirm')->same('password');
    }

}
