<?php

namespace Viviniko\Country\Repositories;

use Viviniko\Repository\CrudRepository;

interface CountryRepository extends CrudRepository
{
    public function findAllByType($type);

    public function findAllByTypeAndParentId($type, $parentId);

    public function findByTypeAndCode($type, $code);
}