<?php

namespace App\Models;

class Article extends BaseModel
{

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

    public static $EnumStatus = [1 => '显示', 0 => '不显示'];

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
