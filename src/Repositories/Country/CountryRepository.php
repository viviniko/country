<?php

namespace Viviniko\Country\Repositories\Country;

interface CountryRepository
{
    public function all();

    public function lists($column = 'name', $key = null);

    public function findByCode($code);
}