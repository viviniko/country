<?php

namespace Viviniko\Country\Repositories\Country;

use Viviniko\Repository\SimpleRepository;

class EloquentCountry extends SimpleRepository implements CountryRepository
{
    protected $modelConfigKey = 'country.country';

    public function all()
    {
        return $this->search([])->get();
    }

    public function findByCode($code)
    {
        return $this->findBy('code', $code)->first();
    }

    public function lists($column = 'name', $key = null)
    {
        return $this->pluck($column, $key);
    }
}