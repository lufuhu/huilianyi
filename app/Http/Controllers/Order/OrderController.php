<?php


namespace App\Http\Controllers\Order;


use App\Http\Controllers\Controller;
use App\Models\Forwarder;
use App\Models\Order;
use App\Models\OrderParcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = new Order();
        if ($request->input('status')){
            $query = $query->where('status', $request->input('status'));
        }
        if ($request->input('forwarder') == 1){
            $forwarder = Forwarder::where('user_id', $request->user()->id)->where('status', 1)->first();
            $query = $query->where('forwarder_id', $forwarder->id);
        } else {
            $query = $query->where('user_id', $request->user()->id);
        }
        $list = $query->with('orderParcels')->orderBy('id', 'desc')->paginate();
        return $this->response($list);
    }

    public function view($id, Request $request){
        $obj = Order::where('user_id', $request->user()->id)->where('id', $request->input('id'))->first();
        if (is_object($obj)){
            $obj->orderParcels;
        }
        return $this->response($obj);
    }

    public function store(Request $request, Order $obj)
    {
        DB::beginTransaction();
        try {
            $user_id = $request->user()->id;
            $all = $request->all();
            $obj->fill($all);
            $obj->user_id =$user_id;
            $obj->save();
            foreach ($request->input('parcel') as $item){
                $orderParcel = new OrderParcel();
                $item['user_id'] = $user_id;
                $item['order_id'] = $obj->id;
                $orderParcel->fill($item);
                $orderParcel->save();
            }
            DB::commit();
            return $this->response($obj->id);
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(5070);
        }
    }

    public function update(Request $request)
    {
        $obj = Order::where('user_id', $request->user()->id)->where('status', 0)->first();
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = Order::find($id);
        $obj->delete();
        return $this->response();
    }
}
