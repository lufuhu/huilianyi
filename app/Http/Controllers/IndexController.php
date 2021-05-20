<?php


namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{

    public function test()
    {
        Country::getCacheAll();
        dd(1);
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
