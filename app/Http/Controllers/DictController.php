<?php


namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Config;
use App\Models\Country;
use App\Models\FbaStorage;
use App\Models\Harbour;
use App\Models\Ship;
use App\Models\WorldCity;
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
                ['value'=> 'DHL-????????????' , 'label' => 'DHL-????????????'],
                ['value'=> 'EMS-????????????' , 'label' => 'EMS-????????????'],
                ['value'=> 'Fedex-????????????' , 'label' => 'Fedex-????????????'],
                ['value'=> 'UPS-????????????' , 'label' => 'UPS-????????????'],
                ['value'=> 'CAE-????????????' , 'label' => 'CAE-????????????'],
                ['value'=> 'CRE-????????????' , 'label' => 'CRE-????????????'],
                ['value'=> 'DPD-???????????????' , 'label' => 'DPD-???????????????'],
                ['value'=> 'SF Express-????????????' , 'label' => 'SF Express-????????????'],
                ['value'=> 'TNT-????????????' , 'label' => 'TNT-????????????'],
            ];
        } else if($request->input('transportation') == 1){
            $list = Airline::getCacheAll();
            foreach ($list as $item){
                $data[] = [
                    'value'=> $item['code'] . '-' .$item['name'] ,
                    'label'=> $item['code'] . '-' .$item['name'] ,
                ];
            }
        } else if($request->input('transportation') == 2){
            $list = Ship::getCacheAll();
            foreach ($list as $item){
                $data[] = [
                    'value'=> $item['name_en_abbr'] . '-' .$item['name_abbr'] ,
                    'label' => $item['name_en_abbr'] . '-' .$item['name_abbr']
                ];
            }
        } else if($request->input('transportation') == 3){
           $data = [
               ['value'=> '????????????-??????' , 'label' => '????????????-??????'],
               ['value'=> '????????????-??????' , 'label' => '????????????-??????'],
               ['value'=> '????????????-??????' , 'label' => '????????????-??????'],
               ['value'=> '????????????-??????' , 'label' => '????????????-??????'],
               ['value'=> '???????????????-??????' , 'label' => '???????????????-??????'],
               ['value'=> '???????????????-??????' , 'label' => '???????????????-??????'],
           ];
        }
        return $this->response($data);
    }

    public function worldCity(Request $request){
        $data = WorldCity::where('pid', $request->input('pid'))->get();
        return $this->response($data);
    }
    public function abroadCountry(){
        $data = WorldCity::getAbroadCountry();
        return $this->response($data);
    }
}
