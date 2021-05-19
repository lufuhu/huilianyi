<?php


namespace App\Http\Controllers\Article;

use App\Models\Article;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 1);
        if ($request->input('type')) {
            $query = $query->where('type', $request->input('type'));
        }
        $list = $query->select('id','title','pid','image')->orderBy('sort', 'desc')->get();
        $list = Article::getSortList($list->toArray());
        return $this->response($list);
    }
}
