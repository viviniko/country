<?php

namespace Viviniko\Country\Models;

use Viviniko\Support\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $tableConfigKey = 'address.countries_table';

    protected $fillable = [ 'id', 'name', 'cca2', 'cca3', 'parent_id', 'type'];

    public function getCodeAttribute()
    {
        return $this->cca2;
    }
}