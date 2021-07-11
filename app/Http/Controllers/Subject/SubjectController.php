<?php


namespace App\Http\Controllers\Subject;


use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use OSS\Core\OssException;
use OSS\OssClient;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Subject::where('user_id', $request->user()->id)->orderBy('id', 'desc');
        if ($request->input('type') > -1) {
            $query = $query->where('type', $request->input('type'));
        }
        $data = $query->paginate();
        return $this->response($data);
    }

    public function view($id)
    {
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

    public function face($id, Request $request)
    {
        $subject = Subject::where('id', $id)->where('user_id', $request->user()->id)->first();
        $url = $this->ossUpload($subject->id . '-' . time() . '.jpg', $request->file('file')->getPathname());
        $subject->auth_img = $url;
        $subject->status = 2;
        $subject->save();
        $faceBodyRes = $this->faceBody([
            "certificateName" => $subject->name,
            "certificateNumber" => $subject->number,
            "facialPictureUrl" => $url,
        ]);
        if ($faceBodyRes['status']) {
            $subject->status = 3;
            $subject->save();
        } else {
            abort(500, $faceBodyRes['message']);
        }
        return $this->response($subject->id);
    }

    private function faceBody($parmas)
    {
        AlibabaCloud::accessKeyClient(env('ALIYUN_ACCESS_KEY_ID'), env('ALIYUN_ACCESS_SECRET'))
            ->regionId('cn-shanghai')
            ->asDefaultClient();
        try {
            $result = AlibabaCloud::roa()
                ->product('facebody')
                ->version('2020-09-10')
                ->pathPattern('/viapi/thirdparty/realperson/execServerSideVerification')
                ->method('POST')
                ->options(['query' => $parmas])
                ->request();
            $result = $result->toArray();
            return ['status' => $result['Data']['Pass'], 'message' => $result['Data']['Reason']];
        } catch (ClientException $e) {
            abort(500, $e->getErrorMessage() . PHP_EOL);
        } catch (ServerException $e) {
            abort(500, $e->getErrorMessage() . PHP_EOL);
        }
    }

    private function ossUpload($url, $path)
    {
        $accessKeyId = env('ALIYUN_ACCESS_KEY_ID');
        $accessKeySecret = env('ALIYUN_ACCESS_SECRET');
        $endpoint = "http://oss-cn-shanghai.aliyuncs.com";
        $bucket = env('ALIYUN_OSS_BUCKET');
        $object = $url;
        $filePath = $path;
        try {
            $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
            $res = $ossClient->uploadFile($bucket, $object, $filePath);
            return $res['info']['url'];
        } catch (OssException $e) {
            abort(500, $e->getMessage());
        }
    }
}
