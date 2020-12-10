<?php
namespace App\Http\Controllers;

use App\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AmazonController extends Controller
{
    /**
     * На основе реферера получим ссылку куда его надо в итоге перебросить
     * @param $id
     * @return mixed
     */
    public function show(Request $request,$id)
    {
        $referer = request()->headers->get('referer');
        $current_url=$request->fullUrl();
        $code=Code::getByCodes([$referer,$current_url]);
        Session::put('code_id', $code->id);
        //записать в бд что зашел
        return Socialite::driver('amazon')->redirect();
    }

    public function callback()
    {

        $id = Session::get('code_id');
        Session::forget('code_id');
        $user = Socialite::driver('amazon')->user();
        //записать в БД
        dump($user);
        dump($id);

        return redirect()->to(Code::find($id)->redirect_url);

    }
}