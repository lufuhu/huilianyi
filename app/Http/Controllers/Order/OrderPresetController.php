<?php


namespace App\Http\Controllers\Order;


use App\Http\Controllers\Controller;
use App\Models\OrderPreset;
use Illuminate\Http\Request;

class OrderPresetController extends Controller
{
    public function index(Request $request)
    {
        $list = OrderPreset::paginate($request->input('page_size', 15));
        return $this->response($list);
    }

    public function store(Request $request, OrderPreset $obj)
    {
        $user_id = $request->user()->id;
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id =$user_id;
        $obj->save();
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = OrderPreset::where('user_id', $request->user()->id)->where('id', $id)->first();
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = OrderPreset::find($id);
        $obj->delete();
        return $this->response();
    }
}
