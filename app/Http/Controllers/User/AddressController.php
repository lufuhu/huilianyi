<?php


namespace App\Http\Controllers\User;

use App\Models\Address;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $query = Address::where('user_id', $request->user()->id)->orderBy('id', 'desc');
        if ($request->input('keyword')){
            $query = $query->whereRaw("concat('name','phone','address') like '%".$request->input('keyword')."%'");
        }
        if ($request->input('type') > -1){
            $query = $query->where('type', $request->input('type'));
        }
        $data = $query->paginate();
        return $this->response($data);
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
