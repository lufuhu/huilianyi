<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

class Article extends BaseModel
{
	use HasDateTimeFormatter;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        "pid",
        "image",
        "content",
        "type",
        "sort",
        "status",
    ];

    public static $EnumType = [
        0 => '教程', 1 => '轮播图', 2 => '公告'
    ];

    public static $EnumStatus = [1 => '是', 0 => '否'];

    public static function getSortList($list)
    {
        $data = [];
        foreach ($list as $item) {
            if (!$item['pid']) {
                $data[$item['id']] = $item;
            }
        }
        foreach ($list as $item) {
            if ($item['pid']) {
                $data[$item['pid']]['children'][] = $item;
            }
        }
        return $data;
    }
}
