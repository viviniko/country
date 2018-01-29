<?php

namespace Viviniko\Country\Contracts;

interface CountryService
{
    public function lists($column = 'name', $key = null);
}