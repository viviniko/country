<?php

namespace Viviniko\Country\Facades;

use Illuminate\Support\Facades\Facade;

class Countries extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Viviniko\Country\Services\CountryService::class;
    }
}