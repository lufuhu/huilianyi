<?php


namespace App\Http\Controllers\Forwarder;

use App\Models\Forwarder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForwarderController extends Controller
{
    public function index(Request $request)
    {
        $list = Forwarder::where('status', 1)->orderBy('sort', 'desc')->paginate();
        foreach ($list as $item){
            $item->user;
        }
        return $this->response($list);
    }

    public function view(Request $request){
        $obj = Forwarder::where('user_id', $request->user()->id)->where('status', $request->input('status'))->first();
        if (is_object($obj)){
            $obj->user;
        }
        return $this->response($obj);
    }

    public function store(Request $request, Forwarder $obj)
    {
        $user_id = $request->user()->id;
        $count = Forwarder::where('user_id', $user_id)->whereIn('status', [0,1,2])->count();
        if ($count != 0){
            abort(5010);
        }
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id =$user_id;
        $obj->save();
        return $this->response();
    }

    public function update(Request $request)
    {
        $obj = Forwarder::where('user_id', $request->user()->id)->where('status', 0)->first();
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = Forwarder::find($id);
        $obj->delete();
        return $this->response();
    }
}
