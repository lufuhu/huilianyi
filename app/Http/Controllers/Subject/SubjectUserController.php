<?php


namespace App\Http\Controllers\Subject;


use App\Http\Controllers\Controller;
use App\Models\SubjectUser;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectUserController extends Controller
{
    public function index(Request $request)
    {
        $query = SubjectUser::where('user_id', $request->user()->id)->orderBy('status', 'asc')->orderBy('id', 'desc');
        $data = $query->paginate();
        return $this->response($data);
    }

    public function user(Request $request){
        $data = User::where('phone', $request->input('phone'))->select('id','nickname','avatarurl')->get();
        return $this->response($data);
    }

    public function store(Request $request, SubjectUser $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->parent_id = $request->user()->id;
        $obj->status = 0;
        $obj->save();
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = SubjectUser::where('id', $id)->where('parent_id', $request->user()->id)->first();
        $data['status'] = 1;
        $obj->update($data);
        return $this->response();
    }

    public function destroy($id, Request $request)
    {
        $obj = SubjectUser::where('id', $id)->where('parent_id', $request->user()->id)->first();
        $obj->delete();
        return $this->response();
    }
}
