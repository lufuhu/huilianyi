<?php

namespace App\Admin\Forms;

use App\Models\User;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Contracts\LazyRenderable;

class UpdateStatus extends Form implements LazyRenderable
{
    use LazyWidget; // 使用异步加载功能

    // 处理请求
    public function handle(array $input)
    {
        // 获取外部传递参数
        $id = $this->payload['id'] ?? null;

        // 表单参数
        $status = $input['status'] ?? null;

        if (! $id) {
            return $this->response()->error('参数错误');
        }

        $user = User::query()->find($id);

        if (! $user) {
            return $this->response()->error('用户不存在');
        }

        $user->update(['status' => $status]);

        return $this->response()->success('状态更新成功')->refresh();
    }

    public function form()
    {
        $this->select('status')->options(User::$EnumStatus)->required();
    }

}
