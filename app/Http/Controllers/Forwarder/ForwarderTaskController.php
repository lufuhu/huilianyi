<?php


namespace App\Http\Controllers\Forwarder;


use App\Http\Controllers\Controller;
use App\Models\Forwarder;
use App\Models\ForwarderTask;
use Illuminate\Http\Request;

class ForwarderTaskController extends Controller
{
    public function index(Request $request)
    {
        $query = new ForwarderTask();
        if ($request->input('user_id')){
            $query = $query->where("user_id", $request->input('user_id'));
        }
        if ($request->input('from')){
            $query = $query->where("from", $request->input('from'));
        }
        if ($request->input('to')){
            $query = $query->where("to", $request->input('to'));
        }
        if ($request->input('transportation')){
            $query = $query->where("transportation", $request->input('transportation'));
        }
        if ($request->input('time')){
            $query = $query->where("min_time", '<', $request->input('time'))
                ->where("max_time", '>', $request->input('time'));
        }
        if ($request->input('guarantee')){
            $query = $query->whereRaw('FIND_IN_SET(?,guarantee)',[$request->input('guarantee')]);
        }
        if ($request->input('cargo')){
            $query = $query->whereRaw('FIND_IN_SET(?,cargo)',[$request->input('cargo')]);
        }
        $list = $query->paginate();
        foreach ($list as $item){
            $item->user;
        }
        return $this->response($list);
    }

    public function view($id, Request $request){
        $obj = ForwarderTask::where('id', $id)->where('user_id', $request->user()->id)->first();
        return $this->response($obj);
    }

    public function store(Request $request, ForwarderTask $obj)
    {
        $forwarder = Forwarder::where('user_id', $request->user()->id)->where('status', 1)->first();
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id = $forwarder->user_id;
        $obj->forwarder_id = $forwarder->id;
        $obj->save();
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = ForwarderTask::where('user_id', $request->user()->id)->where('id', $id)->first();
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id, Request $request)
    {
        $obj =ForwarderTask::where('user_id', $request->user()->id)->where('id', $id)->first();
        $obj->delete();
        return $this->response();
    }
}
