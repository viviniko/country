<?php

namespace Viviniko\Country\Console;

use Viviniko\Country\Models\Country;
use Illuminate\Console\Command;

class CountrySeedCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'address:country:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Countries.';


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        Country::truncate();

        $stateStart = false;
        foreach ($this->getCountries() as $country) {
            if (!$stateStart && empty($country['id'])) {
                $stateStart = true;
                $country['id'] = 1001;
            }
            $country['cca3'] = isset($country['cca3']) ? $country['cca3'] : '';
            Country::create($country);
        }
    }

    protected function getCountries()
    {
        return json_decode(file_get_contents(__DIR__.'/stubs/countries.json'), true);
    }
}
