<?php

namespace Viviniko\Country\Services;

use Viviniko\Country\Enums\CountryType;
use Viviniko\Country\Repositories\Country\CountryRepository;
use Viviniko\Country\Contracts\CountryService as CountryServiceInterface;

class CountryServiceImpl implements CountryServiceInterface
{
    /**
     * @var \Viviniko\Country\Repositories\Country\CountryRepository
     */
    protected $countries;

    /**
     * AddressService constructor.
     * @param \Viviniko\Country\Repositories\Country\CountryRepository $countries
     */
    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
    }

    public function findByCode($code)
    {
        return $this->countries->findByCode($code);
    }

    public function getCountries()
    {
        return $this->countries->findByType(CountryType::COUNTRY);
    }

    public function getStateByName($name, $countryId)
    {
        $states = $this->countries->findByType(CountryType::STATE, $countryId);
        if (count($states) <= 0) {
            return null; // country not found.
        }

        $name = strtolower($name);
        foreach ($states as $state) {
            if (strtolower($state->name) == $name || strtolower($state->cca2) == $name) {
                return $state;
            }
        }

        return false; // state not found.
    }
}