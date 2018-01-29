<?php

namespace Viviniko\Country\Console\Commands;

use Viviniko\Support\Console\CreateMigrationCommand;

class CountryTableCommand extends CreateMigrationCommand
{
    /**
     * @var string
     */
    protected $name = 'country:table';

    /**
     * @var string
     */
    protected $description = 'Create a migration for the country service table';

    /**
     * @var string
     */
    protected $stub = __DIR__.'/stubs/country.stub';

    /**
     * @var string
     */
    protected $migration = 'create_country_table';
}
