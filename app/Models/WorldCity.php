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

    public static function getAbroadCountry(){
        $data = self::where('pid', 0)->where('id', '>', 1)->get();
        $list = [];
        foreach ($data as $k=>$v) {
            $list[] = ["value" => $v->name_zh, "label" => $v->name_zh];
        }
        return $list;
    }

    public static function getCityList($code){
        $list = [];
        $data = self::where('code', $code)->get();
        foreach ($data as $k=>$v){
            $list[$k] = ["value" => $v->name_zh,"label"=> $v->name_zh];
            $children = self::where('pid', $v->id)->get();
            if ($children){
                foreach ($children as $k1=>$v1){
                    $list[$k]['children'][$k1] = ["value" => $v1->name_zh,"label"=> $v1->name_zh];
                    $children2 = self::where('pid', $v1->id)->get();
                    if ($children2){
                        foreach ($children2 as $k2=>$v2){
                            $list[$k]['children'][$k1]['children'][$k2] = ["value" => $v2->name_zh,"label"=> $v2->name_zh];
                        }
                    }
                }
            }
        }
        return $list;
    }
}

