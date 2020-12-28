<?php

namespace App\Observers;

use App\Code;
use App\CodeLog;
class CodeObserver
{
    /**
     * Handle the code "created" event.
     *
     * @param  \App\Code  $code
     * @return void
     */
    public function created(Code $code)
    {
        //
        \Log::info("asdasd2");
    }

    /**
     * Handle the code "updated" event.
     *
     * @param  \App\Code  $code
     * @return void
     */
    public function updated(Code $code)
    {
        \Log::info("asdasd2");
        //
    }
    /**
     * Handle the code "updated" event.
     *
     * @param  \App\Code  $code
     * @return void
     */
    public function updating(Code $code)
    {
        \Log::info("asdasd");
    }
    /**
     * Handle the code "deleted" event.
     *
     * @param  \App\Code  $code
     * @return void
     */
    public function deleted(Code $code)
    {
        //
        \Log::info("asdasd2");
    }

    /**
     * Handle the code "restored" event.
     *
     * @param  \App\Code  $code
     * @return void
     */
    public function restored(Code $code)
    {
        //
        \Log::info("asdasd2");
    }

    /**
     * Handle the code "force deleted" event.
     *
     * @param  \App\Code  $code
     * @return void
     */
    public function forceDeleted(Code $code)
    {
        //
    }
}
