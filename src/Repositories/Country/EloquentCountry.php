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
        return $this->createModel()->where(['cca2' => $code, 'type' => 1])->first();
    }

    public function findByType($type, $parentId = null)
    {
        return $this->findBy(array_merge(['type' => $type], is_null($parentId) ? [] : ['parent_id' => $parentId]));
    }

    public function getCountryByCode($code)
    {
        return $this->findBy(['cca2' => $code, 'type' => 1])->first();
    }
}