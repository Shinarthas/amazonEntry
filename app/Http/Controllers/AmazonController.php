<?php
namespace App\Http\Controllers;

use App\Code;
use App\Customer;
use App\Providers\AmazonProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AmazonController extends Controller
{
    /**
     * На основе реферера получим ссылку куда его надо в итоге перебросить
     * @param $id
     * @return mixed
     */
    public function show(Request $request)
    {
        $referer = request()->headers->get('referer');
        $current_url=$request->fullUrl();
        $code=Code::getByCodes([$referer,$current_url]);
        Session::put('code_id', $code->id);
        Customer::createFromRequestAndCode($request,$code);
        $customer=Customer::whereSessionId(Session::getId())->first();
        if($code->status==0){
            return Redirect::to($code->redirect_url);
        }else if($code->status==1){
            $driver=Socialite::buildProvider(AmazonProvider::class, config('services.amazon'));
            //return Socialite::driver('amazon')->with(['myParam' => 'event_slug=foobar'])->redirect();
            return $driver->redirect();
        }else{
//            $curl_handle=curl_init();
//            curl_setopt($curl_handle, CURLOPT_URL,$code->redirect_url);
//            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
//            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
//            $html = curl_exec($curl_handle);
//            curl_close($curl_handle);

            $url=Socialite::buildProvider(AmazonProvider::class, config('services.amazon'))->redirect()->getTargetUrl();

            return view('iframe',compact('code','url','html'));
        }


    }

    public function callback()
    {

        $id = Session::get('code_id');
        Session::forget('code_id');
        $driver=Socialite::buildProvider(AmazonProvider::class, config('services.amazon'));
        $user = $driver->user();
        Customer::updateByResponse($user,$id);

        return redirect()->to(Code::find($id)->redirect_url);

    }
}
