<?php

namespace Viviniko\Country\Services;

use Viviniko\Country\Enums\CountryType;
use Viviniko\Country\Repositories\CountryRepository;

class CountryServiceImpl implements CountryService
{
    /**
     * @var \Viviniko\Country\Repositories\CountryRepository
     */
    protected $countries;

    /**
     * AddressService constructor.
     * @param \Viviniko\Country\Repositories\CountryRepository $countries
     */
    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
    }

    public function getCountryByCode($code)
    {
        return $this->countries->findByTypeAndCode(CountryType::COUNTRY, $code);
    }

    public function getCountries()
    {
        return $this->countries->findAllByType(CountryType::COUNTRY);
    }

    public function getStates($countryId)
    {
        return $this->countries->findAllByTypeAndParentId(CountryType::STATE, $countryId);
    }
}