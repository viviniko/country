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
}