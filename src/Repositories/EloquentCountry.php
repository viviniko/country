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

    public function findAllByType($type)
    {
        return $this->findAllBy(['type' => $type]);
    }

    public function findAllByTypeAndParentId($type, $parentId)
    {
        return $this->findAllBy(['type' => $type, 'parent_id' => $parentId]);
    }

    public function findByTypeAndCode($type, $code)
    {
        return $this->findBy(['type' => $type, 'cca2' => $code]);
    }
}