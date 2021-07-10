<?php

namespace App\Models;

class WorldCity extends BaseModel
{
    protected $table = "world_city";
    protected $fillable = [
        "pid",
        "name_zh",
        "name_en",
        "code",
        "code_all",
    ];

    public static function getAbroadCountry()
    {
        $data = self::where('pid', 0)->where('id', '>', 1)->get();
        $list = [];
        foreach ($data as $k => $v) {
            $list[] = ["value" => $v->id, "label" => $v->name_zh];
        }
        return $list;
    }

    public static function getCityList($pid)
    {
        $list = [];
        $data = self::where('pid', $pid)->get();
        foreach ($data as $k => $v) {
            $list[$k] = ["value" => $v->id, "label" => $v->name_zh];
            $children = self::where('pid', $v->id)->get();
            if ($children) {
                foreach ($children as $k1 => $v1) {
                    $list[$k]['children'][$k1] = ["value" => $v1->id, "label" => $v1->name_zh];
                    $children2 = self::where('pid', $v1->id)->get();
                    if ($children2) {
                        foreach ($children2 as $k2 => $v2) {
                            $list[$k]['children'][$k1]['children'][$k2] = ["value" => $v2->id, "label" => $v2->name_zh];
                        }
                    } else {
                        $list[$k]['children'][$k1]['children'] = [["value" => $v1->id, "label" => $v1->name_zh]];
                    }
                }
            } else {
                $list[$k]['children'] = [[
                    "value" => $v->id,
                    "label" => $v->name_zh,
                    'children' =>
                        [["value" => $v->id, "label" => $v->name_zh]]
                ]];
            }
        }
        return $list;
    }
}

