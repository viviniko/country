<?php

namespace Viviniko\Country\Enums;

class CountryType
{
    const COUNTRY = 1;

    const STATE = 2;

    public static function values()
    {
        return [
            static::COUNTRY => 'Country',
            static::STATE => 'State',
        ];
    }

}