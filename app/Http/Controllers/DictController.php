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

    public function harbours()
    {
        $data = Harbour::getCacheAll();
        return $this->response($data);
    }

    public function ships()
    {
        $data = Ship::getCacheAll();
        return $this->response($data);
    }

    public function airlines()
    {
        $data = Airline::getCacheAll();
        return $this->response($data);
    }

    public function airports()
    {
        $data = Airport::getCacheAll();
        return $this->response($data);
    }

    public function fba_storage()
    {
        $data = FbaStorage::getCacheAll();
        return $this->response($data);
    }
}
