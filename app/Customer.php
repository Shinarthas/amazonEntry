<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Customer extends Model
{
    public static function createFromRequestAndCode(Request $request,Code $code){
        $customer=new Customer();
        $customer->code()->associate($code);
        $customer->session_id=Session::getId();

        $user_agent=$request->server('HTTP_USER_AGENT');
        $customer->ip=$request->ip();
        $customer->os=self::getOS($user_agent);
        $customer->browser=self::getBrowser($user_agent);
        $customer->custom_user_data=json_encode($user_agent);
        $customer->save();
        return $customer;

    }
    public static function updateByResponse($user,$id){
        $customer=Customer::orderBy('id', 'desc')->firstOrNew(
            ['session_id'=>Session::getId()],
            ['code_id'=>$id]
        );
        $customer->status=1;
        $customer->code_id=$id;

        $customer->amazon_id=$user->id;
        $customer->nickname=$user->nickname;
        $customer->full_name=$user->name;
        $customer->zip_code=$user->zip_code;
        $customer->email=$user->email;
        $customer->completed_at=Carbon::now();
        $customer->save();
        return $customer;
    }
    public function code(){
        return $this->belongsTo(Code::class,'code_id','id');
    }





    public static function getOS($user_agent) {


        $os_platform  = "Unknown OS Platform";

        $os_array     = array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $os_platform = $value;

        return $os_platform;
    }

    public static function getBrowser($user_agent) {

        $browser        = "Unknown Browser";

        $browser_array = array(
            '/msie/i'      => 'Internet Explorer',
            '/firefox/i'   => 'Firefox',
            '/safari/i'    => 'Safari',
            '/chrome/i'    => 'Chrome',
            '/edge/i'      => 'Edge',
            '/opera/i'     => 'Opera',
            '/netscape/i'  => 'Netscape',
            '/maxthon/i'   => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i'    => 'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $browser = $value;

        return $browser;
    }

}
