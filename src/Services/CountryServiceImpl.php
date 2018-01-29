<?php

namespace Viviniko\Country\Services;

use Viviniko\Address\Repositories\Country\CountryRepository;
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

    public function lists($column = 'name', $key = null)
    {
        return $this->countries->lists($column, $key);
    }
}