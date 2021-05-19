<?php


namespace App\Http\Controllers;


use App\Models\User;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('account', $request->input('account'))
            ->orwhere('phone', $request->input('account'))
            ->orwhere('mail', $request->input('account'))
            ->first();
        if (!is_object($user)) {
            abort(5002);
        }
        if ($user->status != 0) {
            abort(5001, User::$EnumStatus[$user->status]);
        }
        if (!Hash::check($request->input('password'), $user->password)) {
            abort(5006);
        }
        return $this->doLogin($user);
    }

    public function phoneLogin(Request $request)
    {
        $key = 'phone-code-' . $request->input('phone');
        if (Cache::get($key) != $request->input('code')) {
            abort(5009);
        }
        $user = User::where('phone', $request->input('phone'))->first();
        if (!is_object($user)) {
            abort(5002);
        }
        return $this->doLogin($user);
    }

    public function wxLogin(Request $request)
    {
        $openid = $unionid = $session_key = '0000000';
        if (!empty($request->input('code'))) {
            $wxAuth = [];
            try {
                $app = Factory::miniProgram(config('wechat'));
                $wxAuth = $app->auth->session($request->input('code'));
                Log::info($wxAuth);
                $openid = $wxAuth['openid'];
                $unionid = isset($wxAuth['unionid']) ? $wxAuth['unionid'] : null;
                $session_key = $wxAuth['session_key'];
                $decryptedData = $app->encryptor->decryptData($session_key, $request->input('userInfo')['iv'], $request->input('userInfo')['encryptedData']);
                Log::info(json_encode($decryptedData));
            } catch (\Exception $e) {
                Log::error("wx-auth", $wxAuth);
                abort(5003);
            }
        }
        if (!$user = User::where('openid', $openid)->first()) {
            $user = new User();
            $params['keyword'] = uniqid();
        }
        $params['openid'] = $openid;
        $params['unionid'] = $unionid;
        $params['session_key'] = $session_key;
        $params['nickname'] = $request->input('userInfo')['nickName'];
        $params['avatarurl'] = $request->input('userInfo')['avatarUrl'];
        $params['gender'] = $request->input('userInfo')['gender'];
        return $this->doLogin($user, $params);
    }

    public function loginOut(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->response();
    }

    public function register(Request $request)
    {
        $key = 'phone-code-' . $request->input('phone');
        if (Cache::get($key) != $request->input('code')) {
            abort(5009);
        }
        if (User::where('account', $request->input('account'))->first()) {
            abort(5004);
        }
        if (User::where('phone', $request->input('phone'))->first()) {
            abort(5005);
        }
        $params = [
            'account' => $request->input('account'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'nickname' => $request->input('account'),
            'avatarurl' => env('APP_URL') . '/logo.png',
        ];
        $user = new User();
        return $this->doLogin($user, $params);
    }

    public function forget(Request $request)
    {
        $key = 'phone-code-' . $request->input('phone');
        if (Cache::get($key) != $request->input('code')) {
            abort(5009);
        }
        $user = User::where('phone', $request->input('phone'))->first();
        if (!is_object($user)) {
            abort(5002);
        }
        $user->password = Hash::make($request->input('password'));
        if (!$user->save()) {
            abort(5001);
        }
        return $this->response();
    }

    public function bindPhone(Request $request)
    {
        $key = 'phone-code-' . $request->input('phone');
        if (Cache::get($key) != $request->input('code')) {
            abort(5009);
        }
        if (is_object(User::where('phone', $request->input('phone'))->first())) {
            abort(5005);
        }
        return $this->doLogin($request->user(), ['phone' => $request->input('phone')]);
    }

    public function bindMail(Request $request)
    {
        $key = 'mail-code-' . $request->input('mail');
        if (Cache::get($key) != $request->input('code')) {
            abort(5009);
        }
        if (is_object(User::where('mail', $request->input('mail'))->first())) {
            abort(5008);
        }
        return $this->doLogin($request->user(), ['mail' => $request->input('mail')]);
    }

    public function doLogin($user, $params = [])
    {
        $params['last_login_time'] = date("Y-m-d H:i:s", time());
        $user->fill($params);
        if (!$user->save()) {
            abort(5001);
        }
        $token = $user->createToken($user->id);
        return $this->response([
            'token' => $token->plainTextToken,
            'userInfo' => $user
        ]);
    }

    public function updateUserInfo(Request $request)
    {
        $keys = ['nickname', 'avatarurl', 'gender'];
        $params = [];
        foreach ($keys as $item) {
            if ($request->input($item)) {
                $params[$item] = $request->input($item);
            }
        }
        return $this->doLogin($request->user(), $params);
    }
}
