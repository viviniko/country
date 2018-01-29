<?php

namespace Viviniko\Country\Models;

use Viviniko\Support\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $tableConfigKey = 'country.countries_table';

    protected $fillable = [
        'name', 'code',
    ];
}