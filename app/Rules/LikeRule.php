<?php

namespace App\Rules;

use App\Code;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class LikeRule implements Rule
{
    private $id=null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id=null)
    {
        $this->id=$id;
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $id=$this->id;
        return !(bool)Code::query()
            ->where(function($query) use ($attribute,$value){
                $query->where($attribute,'like',"'%".$value."%'");
                $query->orWhere(DB::raw("'".$value. "'"),'like', DB::raw("CONCAT('%', $attribute ,'%')"));
            })
            ->when($id, function ($query,$id) {
                return $query->where('id','!=',$id);
            })->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You already have a rule that covers this string.';
    }
}
