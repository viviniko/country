<?php

namespace Viviniko\Country\Contracts;

interface CountryService
{
    /**
     * Get all countries.
     *
     * @return mixed
     */
    public function getCountries();

    /**
     * @param $code
     * @return mixed
     */
    public function findByCode($code);
}