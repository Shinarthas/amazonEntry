<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Code extends Model
{
    public static function getByCodes(array $codes){
        return Code::query()->where(function($query) use($codes) {
            foreach ($codes as $code){
                $query->orWhere(DB::raw("'$code'"),'like',DB::raw("CONCAT('%', code, '%')"));
            }
        })->firstOrFail();
    }
    public static function getHtml(Code $code){
        $options = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Accept-language: en\r\n" .
                    "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
            )
        );

        $context = stream_context_create($options);
        $html = file_get_contents($code->redirect_url,false,$context);
        $uid=uniqid();
        Storage::put($uid.'.html',$html);
        $code->html=$uid.'.html';

        $code->save();
    }
}
