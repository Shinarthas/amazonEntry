<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CodeLog extends Model
{
    protected $table="code_logs";
    /**
     * Get the user that owns the phone.
     */
    public function code()
    {
        return $this->belongsTo(Code::class);
    }
}
