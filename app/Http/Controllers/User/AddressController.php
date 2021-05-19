<?php


namespace App\Http\Controllers\User;

use App\Models\Address;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $list = Address::where('user_id', $request->user()->id)->orderBy('id', 'desc')->paginate();
        return $this->response($list);
    }

    public function view($id){
        $obj = Address::find($id);
        return $this->response($obj);
    }

    public function store(Request $request, Address $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id = $request->user()->id;
        $obj->save();
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = Address::find($id);
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = Address::find($id);
        $obj->delete();
        return $this->response();
    }
}
