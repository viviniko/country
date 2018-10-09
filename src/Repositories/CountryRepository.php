<?php

namespace Viviniko\Country\Repositories;

interface CountryRepository
{
    public function all();

    public function findAllByType($type, $parentId = null);

    public function findByCode($code);
}