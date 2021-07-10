<?php


namespace App\Http\Controllers;

use App\Models\WorldCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function test(){
        $data = WorldCity::getCityList(1);
        dd($data);
    }
    public function test2()
    {

        $pids = WorldCity::getPluckList('code_all', 'id');
        $data = WorldCity::get();
        foreach ($data as $item){
            if ($item->code == $item->code_all){
                $item->pid = 0;
            } else {
                $item->pid = $pids[$this->getPid($item->code_all)];
            }
            $item->save();
        }
        dd(1);
    }

    function getPid($pid){
        $arr = explode('-', $pid);
        array_pop($arr);
        return implode('-', $arr);
    }

    public function test1(){
        //        $zh = $this->getItem('xml/zh-cn.xml');
        $en = $this->getItem('xml/en.xml');
        $data = [];
        foreach ($en as $k=>$v){
            $obj = WorldCity::where('code_all', $k)->first();
            if (is_object($obj)){
                $obj->name_en = $v;
                $obj->save();
            }
        }
    }
    public function getItem($path){
        $xml = file_get_contents($path);
        $data = $this->xmlToArray($xml);
        $arr = [];
        foreach ($data['CountryRegion'] as $item){
            $code1 = $item['@attributes']['Code'];
            $arr[$code1] = $item['@attributes']['Name'];
            if (isset($item['State'])){
                if (isset($item['State']['City'])){
                    foreach ($item['State']['City'] as $item2){
                        $code2 = $item2['@attributes']['Code'];
                        $arr[$code1 . '-' .$code2] = $item2['@attributes']['Name'];
                        if (isset($item2['Region'])){
                            foreach ($item2['Region'] as $item3){
                                $code4 = $item3['@attributes']['Code'];
                                $arr[$code1 . '-' .$code2  . '-'. $code4] = $item3['@attributes']['Name'];
                            }
                        }
                    }
                }else{
                    foreach ($item['State'] as $item1){
                        $code2 = '';
                        if (isset($item1['@attributes'])){
                            $code2 = $item1['@attributes']['Code'];
                            $arr[$code1 . '-' .$code2] = $item1['@attributes']['Name'];
                        }
                        if (isset($item1['City'])){
                            if (isset($item1['City']['@attributes'])){
                                $code3 = $item1['City']['@attributes']['Code'];
                                $arr[$code1 . '-' .$code2 . '-'. $code3] = $item1['City']['@attributes']['Name'];
                                if (isset($item2['Region'])){
                                    foreach ($item1['City']['Region'] as $item3){
                                        $code4 = $item3['@attributes']['Code'];
                                        $arr[$code1 . '-' .$code2 . '-'. $code3 . '-'. $code4] = $item3['@attributes']['Name'];
                                    }
                                }
                            }else{
                                foreach ($item1['City'] as $item2){
                                    $code3 = $item2['@attributes']['Code'];
                                    $arr[$code1 . '-' .$code2 . '-'. $code3] = $item2['@attributes']['Name'];
                                    if (isset($item2['Region'])){
                                        if(isset($item2['Region']['@attributes'])){
                                            $code4 = $item2['Region']['@attributes']['Code'];
                                            $arr[$code1 . '-' .$code2 . '-'. $code3. '-'. $code4] = $item2['Region']['@attributes']['Name'];
                                        } else{
                                            foreach ($item2['Region'] as $item3){
                                                $code4 = $item3['@attributes']['Code'];
                                                $arr[$code1 . '-' .$code2 . '-'. $code3 . '-'. $code4] = $item3['@attributes']['Name'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }
    function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }

    public function countries()
    {
//        $countries = Countries::all();
//        $list = [];
//        foreach ($countries as $item) {
//            $list[$item->letter][] = $item->title;
//        }
//        $letter = array_keys($list);
//        sort($letter);
//        $data =[];
//        foreach ($letter as $item) {
//            $data[] = ['letter' => $item, 'data' => $list[$item]];
//        }
//        return $this->response(compact('letter', 'data'));
    }

    public function upload(Request $request)
    {
        $url = Storage::putFile('public/upload/' . date("Ymd"), $request->file('file'));
        return $this->response(str_replace('public/', '', $url));
    }

    public function phoneCode(Request $request)
    {
        $keyCycle = 'phone-code-' . $request->input('phone') . '-cycle';
        if (Cache::has($keyCycle)) {
            abort(5007);
        }
        $key = 'phone-code-' . $request->input('phone');
        $code = rand(100000, 999999);
        Cache::put($key, $code, 180);
        Cache::put($keyCycle, 1, 60);
        return $this->response(null, '验证码已发送（' . $code . '）');
    }

    public function mailCode(Request $request)
    {
        $keyCycle = 'mail-code-' . $request->input('mail') . '-cycle';
        if (Cache::has($keyCycle)) {
            abort(5007);
        }
        $key = 'mail-code-' . $request->input('mail');
        $code = rand(100000, 999999);
        Cache::put($key, $code, 180);
        Cache::put($keyCycle, 1, 60);
        return $this->response(null, '验证码已发送（' . $code . '）');
    }
}
