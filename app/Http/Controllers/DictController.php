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
}
