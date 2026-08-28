<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ImportLocations extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'ZiibaySoft';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'location:import';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Imports countries, regions, and cities from a structured seed array to populate the programmatic SEO engine safely.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'location:import';

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        CLI::write('Starting Location Data Import...', 'cyan');

        // Note: The XAMPP MySQL daemon is currently offline in this environment. 
        // This command provides the resilient architecture to import records 
        // idempotently once the database connection is restored.
        // It uses updateBatch/insertBatch patterns implicitly by checking existence first.

        $db = \Config\Database::connect();
        
        try {
            // Check if DB is alive
            $db->getVersion();
        } catch (\Throwable $e) {
            CLI::error('Database connection failed. Please ensure MySQL is running.');
            CLI::write('Error: ' . $e->getMessage(), 'red');
            return;
        }

        // Mock Payload representing the JSON/CSV seed
        $locationsData = $this->getSeedData();

        $countriesAdded = 0;
        $regionsAdded = 0;
        $citiesAdded = 0;

        foreach ($locationsData as $country) {
            // 1. Process Country
            $countryId = $this->upsertCountry($db, $country);
            $countriesAdded++;

            if (isset($country['regions'])) {
                foreach ($country['regions'] as $region) {
                    // 2. Process Region
                    $regionId = $this->upsertRegion($db, $region, $countryId);
                    $regionsAdded++;

                    if (isset($region['cities'])) {
                        foreach ($region['cities'] as $city) {
                            // 3. Process City
                            $this->upsertCity($db, $city, $countryId, $regionId);
                            $citiesAdded++;
                        }
                    }
                }
            }
        }

        CLI::write("Import complete! Processed $countriesAdded countries, $regionsAdded regions, and $citiesAdded cities.", 'green');
    }

    private function upsertCountry($db, $data)
    {
        $builder = $db->table('countries');
        $existing = $builder->where('slug', $data['slug'])->get()->getRow();

        if ($existing) {
            return $existing->id;
        }

        $builder->insert([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'iso_code' => $data['iso_code'],
            'continent' => $data['continent'],
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $db->insertID();
    }

    private function upsertRegion($db, $data, $countryId)
    {
        $builder = $db->table('regions');
        $existing = $builder->where('country_id', $countryId)->where('slug', $data['slug'])->get()->getRow();

        if ($existing) {
            return $existing->id;
        }

        $builder->insert([
            'country_id' => $countryId,
            'name' => $data['name'],
            'slug' => $data['slug'],
            'region_type' => $data['type'] ?? 'state',
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $db->insertID();
    }

    private function upsertCity($db, $data, $countryId, $regionId)
    {
        $builder = $db->table('cities');
        $existing = $builder->where('country_id', $countryId)->where('region_id', $regionId)->where('slug', $data['slug'])->get()->getRow();

        if ($existing) {
            return $existing->id;
        }

        $builder->insert([
            'country_id' => $countryId,
            'region_id' => $regionId,
            'name' => $data['name'],
            'slug' => $data['slug'],
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $db->insertID();
    }

    private function getSeedData()
    {
        return [
            [
                'name' => 'United States',
                'slug' => 'united-states',
                'iso_code' => 'US',
                'continent' => 'North America',
                'regions' => [
                    [
                        'name' => 'California',
                        'slug' => 'california',
                        'type' => 'state',
                        'cities' => [
                            ['name' => 'Los Angeles', 'slug' => 'los-angeles'],
                            ['name' => 'San Francisco', 'slug' => 'san-francisco']
                        ]
                    ],
                    [
                        'name' => 'New York',
                        'slug' => 'new-york',
                        'type' => 'state',
                        'cities' => [
                            ['name' => 'New York City', 'slug' => 'new-york-city']
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Germany',
                'slug' => 'germany',
                'iso_code' => 'DE',
                'continent' => 'Europe',
                'regions' => [
                    [
                        'name' => 'Bavaria',
                        'slug' => 'bavaria',
                        'type' => 'state',
                        'cities' => [
                            ['name' => 'Munich', 'slug' => 'munich']
                        ]
                    ]
                ]
            ],
            [
                'name' => 'United Kingdom',
                'slug' => 'united-kingdom',
                'iso_code' => 'GB',
                'continent' => 'Europe',
                'regions' => [
                    [
                        'name' => 'England',
                        'slug' => 'england',
                        'type' => 'country',
                        'cities' => [
                            ['name' => 'London', 'slug' => 'london']
                        ]
                    ]
                ]
            ]
        ];
    }
}
