<?php

namespace Blx32\LaravelPagHiper;

use Illuminate\Support\Facades\Facade;

class PagHiperFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'webmaster.paghiper';
    }
}
