<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;
use App\Admin\Forms\UpdateStatus as UpdateStatusForm;

class UpdateStatus extends RowAction
{
    protected $title = '修改状态';

    public function render()
    {
        $form = UpdateStatusForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
