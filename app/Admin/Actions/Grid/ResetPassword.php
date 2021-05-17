<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;
use App\Admin\Forms\ResetPassword as ResetPasswordForm;
use Illuminate\Support\Facades\Log;

class ResetPassword extends RowAction
{
    protected $title = '重置密码';

    public function render()
    {
        $form = ResetPasswordForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
