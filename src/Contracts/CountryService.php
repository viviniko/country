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
     * Get states given country id.
     *
     * @param $countryId
     * @return mixed
     */
    public function getStates($countryId);

    /**
     * @param $code
     * @return mixed
     */
    public function findByCode($code);
}