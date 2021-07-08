<?php


namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Config;
use App\Models\Country;
use App\Models\FbaStorage;
use App\Models\Harbour;
use App\Models\Ship;
use Illuminate\Http\Request;

class DictController extends Controller
{
    public function configs(Request $request)
    {
        $keys = explode(',', $request->input('keys'));
        $data = [];
        foreach ($keys as $item) {
            $data[$item] = Config::getValue($item);
        }
        return $this->response($data);
    }

    public function countrys()
    {
        $data = Country::getCacheAll();
        return $this->response($data);
    }

    public function harbours(Request $request)
    {
        $query = Harbour::where('status', 1);
        if ($request->input('keyword')){
            $query = $query->whereRaw("concat('name','code','name_en','country','country_code','line') like '%".$request->input('keyword')."%'");
        }
        $data = $query->paginate();
        return $this->response($data);
    }

    public function ships(Request $request)
    {
        $query = Ship::where('status', 1);
        if ($request->input('keyword')){
            $query = $query->whereRaw("concat('name','name_abbr','name_en','name_en_abbr') like '%".$request->input('keyword')."%'");
        }
        $data = $query->paginate();
        return $this->response($data);
    }

    public function airlines(Request $request)
    {
        $query = Airline::where('status', 1);
        if ($request->input('keyword')){
            $query = $query->whereRaw("concat('name','name_en','code','code_three','waybill','type') like '%".$request->input('keyword')."%'");
        }
        $data = $query->paginate();
        return $this->response($data);
    }

    public function airports(Request $request)
    {
        $query = Airport::where('status', 1);
        if ($request->input('keyword')){
            $query = $query->whereRaw("concat('name','code','name_en','country','country_code','code_four','city') like '%".$request->input('keyword')."%'");
        }
        $data = $query->paginate();
        return $this->response($data);
    }

    public function fba_storage(Request $request)
    {
        $query = FbaStorage::where('status', 1);
        if ($request->input('keyword')){
            $query = $query->whereRaw("concat('code','address','city','state','area','country','country_code') like '%".$request->input('keyword')."%'");
        }
        $data = $query->paginate();
        return $this->response($data);
    }

    public function express(Request $request){
        $data = [];
        if ($request->input('transportation') == 0){
            $data = [
                ['value'=> 'DHL-敦豪快递' , 'label' => 'DHL-敦豪快递'],
                ['value'=> 'EMS-中国邮政' , 'label' => 'EMS-中国邮政'],
                ['value'=> 'Fedex-联邦快递' , 'label' => 'Fedex-联邦快递'],
                ['value'=> 'UPS-联合包裹' , 'label' => 'UPS-联合包裹'],
                ['value'=> 'CAE-民航快递' , 'label' => 'CAE-民航快递'],
                ['value'=> 'CRE-中铁快运' , 'label' => 'CRE-中铁快运'],
                ['value'=> 'DPD-德普达快运' , 'label' => 'DPD-德普达快运'],
                ['value'=> 'SF Express-顺丰国际' , 'label' => 'SF Express-顺丰国际'],
                ['value'=> 'TNT-天地快运' , 'label' => 'TNT-天地快运'],
            ];
        } else if($request->input('transportation') == 1){
            $list = Airline::getCacheAll();
            foreach ($list as $item){
                $data = ['value'=> $item->name , 'label' => $item->name];
            }
        } else if($request->input('transportation') == 2){
            $list = Ship::getCacheAll();
            foreach ($list as $item){
                $data = ['value'=> $item->name , 'label' => $item->name];
            }
        } else if($request->input('transportation') == 3){
           $data = [
               ['value'=> '中欧铁路-散柜' , 'label' => '中欧铁路-散柜'],
               ['value'=> '中欧铁路-整柜' , 'label' => '中欧铁路-整柜'],
               ['value'=> '中欧卡车-整车' , 'label' => '中欧卡车-整车'],
               ['value'=> '中欧卡车-零担' , 'label' => '中欧卡车-零担'],
               ['value'=> '东南亚铁路-整车' , 'label' => '东南亚铁路-整车'],
               ['value'=> '东南亚铁路-零担' , 'label' => '东南亚铁路-零担'],
           ];
        }
        return $this->response($data);
    }
}
