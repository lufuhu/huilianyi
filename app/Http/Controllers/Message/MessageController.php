<?php


namespace App\Http\Controllers\Message;


use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request){
        $list = Message::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->paginate();
        return $this->response($list);
    }
}
