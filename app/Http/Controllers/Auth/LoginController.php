<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //ログインボタンからリンク
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    //Callback処理
    public function handleProviderCallback($social)
    {
        //ソーシャルサービス（情報）を取得
        $userSocial = Socialite::driver('twitter')->user();

        if(empty($userSocial->getEmail())){
            return redirect('/login_error');
        }

        //emailで登録を調べる
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        //登録（email）の有無で分岐
        if($user){

            //登録あればそのままログイン（2回目以降）
            Auth::login($user);
            return redirect('/home');

        }else{

            //なければ登録（初回）
            $newuser = new User;
            $newuser->name = $userSocial->getName();
            $newuser->email = $userSocial->getEmail();
            $newuser->twitter_id = $userSocial->getNickname();

//            $img = file_get_contents($userSocial->avatar_original);
//            if ($img !== false) {
//                $file_name = $userSocial->id . '_' . uniqid() . '.jpg';
//                Storage::put('public/profile_images/' . $file_name, $img);
//                $newuser->avatar = $file_name;
//            }

            $newuser->save();

            //そのままログイン
            Auth::login($newuser);
            return redirect('/home');

        }
    }

    // ログアウト
    public function logout()
    {

        Auth::logout();
        //dd(Auth::user());
        return redirect('/home');
    }

}
