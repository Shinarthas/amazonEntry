<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Code extends Model
{
    public static function getByCodes(array $codes){
        return Code::query()->where(function($query) use($codes) {
            foreach ($codes as $code){
                $query->orWhere(DB::raw("'$code'"),'like',DB::raw("CONCAT('%', code, '%')"));
            }
        })->firstOrFail();
    }
}
