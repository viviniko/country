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
     * Get state by given name.
     *
     * @param $name
     * @param $countryId
     * @return mixed
     */
    public function getStateByName($name, $countryId);

    /**
     * @param $code
     * @return mixed
     */
    public function findByCode($code);
}