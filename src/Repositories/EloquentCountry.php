<?php

namespace Viviniko\Country\Repositories;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentCountry extends EloquentRepository implements CountryRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('country.country'));
    }

    public function findAllByType($type, $parentId = null)
    {
        return $this->findAllBy(array_merge(['type' => $type], is_null($parentId) ? [] : ['parent_id' => $parentId]));
    }

    public function findByCode($code)
    {
        return $this->findBy(['cca2' => $code, 'type' => 1]);
    }
}