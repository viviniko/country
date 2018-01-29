<?php

namespace Viviniko\Country\Repositories\Country;

interface CountryRepository
{
    public function all();

    public function findByCode($code);

    public function findByType($type, $parentId);

    public function getCountryByCode($code);
}