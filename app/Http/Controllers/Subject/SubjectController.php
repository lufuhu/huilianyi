<?php


namespace App\Http\Controllers\Subject;


use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Subject::where('user_id', $request->user()->id)->orderBy('id', 'desc');
        if ($request->input('type') > -1){
            $query = $query->where('type', $request->input('type'));
        }
        $data = $query->paginate();
        return $this->response($data);
    }

    public function view($id){
        $obj = Subject::find($id);
        return $this->response($obj);
    }

    public function store(Request $request, Subject $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id = $request->user()->id;
        $obj->save();
        return $this->response($obj->id);
    }

    public function update($id, Request $request)
    {
        $obj = Subject::find($id);
        $data = $request->all();
        $data['status'] = 1;
        $obj->update($data);
        return $this->response($obj->id);
    }

    public function destroy($id)
    {
        $obj = Subject::find($id);
        $obj->delete();
        return $this->response();
    }

    public function face(){
        return $this->response();
    }
}
