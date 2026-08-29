<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InternationalLocationSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('locations');

        // United States
        $builder->insert([
            'name' => 'United States',
            'slug' => 'united-states',
            'location_type' => 'country',
            'country_code' => 'US',
            'locale' => 'en-US',
            'currency' => 'USD',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Alabama',
            'slug' => 'alabama',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Alabama'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Alaska',
            'slug' => 'alaska',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Alaska'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Arizona',
            'slug' => 'arizona',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Arizona'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Arkansas',
            'slug' => 'arkansas',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Arkansas'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'California',
            'slug' => 'california',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['California'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Colorado',
            'slug' => 'colorado',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Colorado'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Connecticut',
            'slug' => 'connecticut',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Connecticut'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Delaware',
            'slug' => 'delaware',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Delaware'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Florida',
            'slug' => 'florida',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Florida'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Georgia',
            'slug' => 'georgia',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Georgia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Hawaii',
            'slug' => 'hawaii',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Hawaii'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Idaho',
            'slug' => 'idaho',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Idaho'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Illinois',
            'slug' => 'illinois',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Illinois'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Indiana',
            'slug' => 'indiana',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Indiana'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Iowa',
            'slug' => 'iowa',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Iowa'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Kansas',
            'slug' => 'kansas',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Kansas'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Kentucky',
            'slug' => 'kentucky',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Kentucky'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Louisiana',
            'slug' => 'louisiana',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Louisiana'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Maine',
            'slug' => 'maine',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Maine'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Maryland',
            'slug' => 'maryland',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Maryland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Massachusetts',
            'slug' => 'massachusetts',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Massachusetts'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Michigan',
            'slug' => 'michigan',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Michigan'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Minnesota',
            'slug' => 'minnesota',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Minnesota'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Mississippi',
            'slug' => 'mississippi',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Mississippi'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Missouri',
            'slug' => 'missouri',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Missouri'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Montana',
            'slug' => 'montana',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Montana'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Nebraska',
            'slug' => 'nebraska',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Nebraska'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Nevada',
            'slug' => 'nevada',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Nevada'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'New Hampshire',
            'slug' => 'new-hampshire',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['New Hampshire'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'New Jersey',
            'slug' => 'new-jersey',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['New Jersey'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'New Mexico',
            'slug' => 'new-mexico',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['New Mexico'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'New York',
            'slug' => 'new-york',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['New York'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'North Carolina',
            'slug' => 'north-carolina',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['North Carolina'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'North Dakota',
            'slug' => 'north-dakota',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['North Dakota'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Ohio',
            'slug' => 'ohio',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Ohio'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Oklahoma',
            'slug' => 'oklahoma',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Oklahoma'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Oregon',
            'slug' => 'oregon',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Oregon'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Pennsylvania',
            'slug' => 'pennsylvania',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Pennsylvania'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Rhode Island',
            'slug' => 'rhode-island',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Rhode Island'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'South Carolina',
            'slug' => 'south-carolina',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['South Carolina'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'South Dakota',
            'slug' => 'south-dakota',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['South Dakota'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Tennessee',
            'slug' => 'tennessee',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Tennessee'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Texas',
            'slug' => 'texas',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Texas'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Utah',
            'slug' => 'utah',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Utah'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Vermont',
            'slug' => 'vermont',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Vermont'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Virginia',
            'slug' => 'virginia',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Virginia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Washington',
            'slug' => 'washington',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Washington'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'West Virginia',
            'slug' => 'west-virginia',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['West Virginia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Wisconsin',
            'slug' => 'wisconsin',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Wisconsin'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Wyoming',
            'slug' => 'wyoming',
            'location_type' => 'region',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Wyoming'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['New York'],
            'name' => 'New York',
            'slug' => 'new-york',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['California'],
            'name' => 'Los Angeles',
            'slug' => 'los-angeles',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Illinois'],
            'name' => 'Chicago',
            'slug' => 'chicago',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Texas'],
            'name' => 'Houston',
            'slug' => 'houston',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Arizona'],
            'name' => 'Phoenix',
            'slug' => 'phoenix',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Pennsylvania'],
            'name' => 'Philadelphia',
            'slug' => 'philadelphia',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Texas'],
            'name' => 'San Antonio',
            'slug' => 'san-antonio',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['California'],
            'name' => 'San Diego',
            'slug' => 'san-diego',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Texas'],
            'name' => 'Dallas',
            'slug' => 'dallas',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['California'],
            'name' => 'San Jose',
            'slug' => 'san-jose',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Texas'],
            'name' => 'Austin',
            'slug' => 'austin',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Florida'],
            'name' => 'Jacksonville',
            'slug' => 'jacksonville',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Texas'],
            'name' => 'Fort Worth',
            'slug' => 'fort-worth',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ohio'],
            'name' => 'Columbus',
            'slug' => 'columbus',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Carolina'],
            'name' => 'Charlotte',
            'slug' => 'charlotte',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['California'],
            'name' => 'San Francisco',
            'slug' => 'san-francisco',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Indiana'],
            'name' => 'Indianapolis',
            'slug' => 'indianapolis',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Washington'],
            'name' => 'Seattle',
            'slug' => 'seattle',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Colorado'],
            'name' => 'Denver',
            'slug' => 'denver',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Washington, D.C.',
            'slug' => 'washington-dc',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Massachusetts'],
            'name' => 'Boston',
            'slug' => 'boston',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Tennessee'],
            'name' => 'Nashville',
            'slug' => 'nashville',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Nevada'],
            'name' => 'Las Vegas',
            'slug' => 'las-vegas',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Oregon'],
            'name' => 'Portland',
            'slug' => 'portland',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Michigan'],
            'name' => 'Detroit',
            'slug' => 'detroit',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Florida'],
            'name' => 'Miami',
            'slug' => 'miami',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Georgia'],
            'name' => 'Atlanta',
            'slug' => 'atlanta',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Minnesota'],
            'name' => 'Minneapolis',
            'slug' => 'minneapolis',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Florida'],
            'name' => 'Orlando',
            'slug' => 'orlando',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Florida'],
            'name' => 'Tampa',
            'slug' => 'tampa',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Pennsylvania'],
            'name' => 'Pittsburgh',
            'slug' => 'pittsburgh',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ohio'],
            'name' => 'Cleveland',
            'slug' => 'cleveland',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ohio'],
            'name' => 'Cincinnati',
            'slug' => 'cincinnati',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Missouri'],
            'name' => 'Kansas City',
            'slug' => 'kansas-city',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Missouri'],
            'name' => 'St. Louis',
            'slug' => 'st-louis',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Carolina'],
            'name' => 'Raleigh',
            'slug' => 'raleigh',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['California'],
            'name' => 'Sacramento',
            'slug' => 'sacramento',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Utah'],
            'name' => 'Salt Lake City',
            'slug' => 'salt-lake-city',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Maryland'],
            'name' => 'Baltimore',
            'slug' => 'baltimore',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Wisconsin'],
            'name' => 'Milwaukee',
            'slug' => 'milwaukee',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Virginia'],
            'name' => 'Richmond',
            'slug' => 'richmond',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Louisiana'],
            'name' => 'New Orleans',
            'slug' => 'new-orleans',
            'location_type' => 'city',
            'country_code' => 'US',
            'locale' => 'en-US',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // United Kingdom
        $builder->insert([
            'name' => 'United Kingdom',
            'slug' => 'united-kingdom',
            'location_type' => 'country',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'currency' => 'GBP',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'England',
            'slug' => 'england',
            'location_type' => 'region',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['England'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Scotland',
            'slug' => 'scotland',
            'location_type' => 'region',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Scotland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Wales',
            'slug' => 'wales',
            'location_type' => 'region',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Wales'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Northern Ireland',
            'slug' => 'northern-ireland',
            'location_type' => 'region',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Northern Ireland'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'London',
            'slug' => 'london',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Manchester',
            'slug' => 'manchester',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Birmingham',
            'slug' => 'birmingham',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Liverpool',
            'slug' => 'liverpool',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Leeds',
            'slug' => 'leeds',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Bristol',
            'slug' => 'bristol',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Sheffield',
            'slug' => 'sheffield',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Scotland'],
            'name' => 'Edinburgh',
            'slug' => 'edinburgh',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Scotland'],
            'name' => 'Glasgow',
            'slug' => 'glasgow',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Wales'],
            'name' => 'Cardiff',
            'slug' => 'cardiff',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Northern Ireland'],
            'name' => 'Belfast',
            'slug' => 'belfast',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Leicester',
            'slug' => 'leicester',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Nottingham',
            'slug' => 'nottingham',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Newcastle',
            'slug' => 'newcastle',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Southampton',
            'slug' => 'southampton',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Brighton',
            'slug' => 'brighton',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Oxford',
            'slug' => 'oxford',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Cambridge',
            'slug' => 'cambridge',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Reading',
            'slug' => 'reading',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['England'],
            'name' => 'Coventry',
            'slug' => 'coventry',
            'location_type' => 'city',
            'country_code' => 'GB',
            'locale' => 'en-GB',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Australia
        $builder->insert([
            'name' => 'Australia',
            'slug' => 'australia',
            'location_type' => 'country',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'currency' => 'AUD',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'New South Wales',
            'slug' => 'new-south-wales',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['New South Wales'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Victoria',
            'slug' => 'victoria',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Victoria'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Queensland',
            'slug' => 'queensland',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Queensland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Western Australia',
            'slug' => 'western-australia',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Western Australia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'South Australia',
            'slug' => 'south-australia',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['South Australia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Tasmania',
            'slug' => 'tasmania',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Tasmania'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Australian Capital Territory',
            'slug' => 'australian-capital-territory',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Australian Capital Territory'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Northern Territory',
            'slug' => 'northern-territory',
            'location_type' => 'region',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Northern Territory'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['New South Wales'],
            'name' => 'Sydney',
            'slug' => 'sydney',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Victoria'],
            'name' => 'Melbourne',
            'slug' => 'melbourne',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Queensland'],
            'name' => 'Brisbane',
            'slug' => 'brisbane',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Western Australia'],
            'name' => 'Perth',
            'slug' => 'perth',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['South Australia'],
            'name' => 'Adelaide',
            'slug' => 'adelaide',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Australian Capital Territory'],
            'name' => 'Canberra',
            'slug' => 'canberra',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Queensland'],
            'name' => 'Gold Coast',
            'slug' => 'gold-coast',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['New South Wales'],
            'name' => 'Newcastle',
            'slug' => 'newcastle',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['New South Wales'],
            'name' => 'Wollongong',
            'slug' => 'wollongong',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Tasmania'],
            'name' => 'Hobart',
            'slug' => 'hobart',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Victoria'],
            'name' => 'Geelong',
            'slug' => 'geelong',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Queensland'],
            'name' => 'Townsville',
            'slug' => 'townsville',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Queensland'],
            'name' => 'Cairns',
            'slug' => 'cairns',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Northern Territory'],
            'name' => 'Darwin',
            'slug' => 'darwin',
            'location_type' => 'city',
            'country_code' => 'AU',
            'locale' => 'en-AU',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Germany
        $builder->insert([
            'name' => 'Germany',
            'slug' => 'germany',
            'location_type' => 'country',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Baden-Württemberg',
            'slug' => 'baden-wurttemberg',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Baden-Württemberg'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Bavaria',
            'slug' => 'bavaria',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Bavaria'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Berlin',
            'slug' => 'berlin',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Berlin'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Brandenburg',
            'slug' => 'brandenburg',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Brandenburg'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Bremen',
            'slug' => 'bremen',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Bremen'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Hamburg',
            'slug' => 'hamburg',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Hamburg'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Hesse',
            'slug' => 'hesse',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Hesse'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Lower Saxony',
            'slug' => 'lower-saxony',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Lower Saxony'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Mecklenburg-Vorpommern',
            'slug' => 'mecklenburg-vorpommern',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Mecklenburg-Vorpommern'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'North Rhine-Westphalia',
            'slug' => 'north-rhine-westphalia',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['North Rhine-Westphalia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Rhineland-Palatinate',
            'slug' => 'rhineland-palatinate',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Rhineland-Palatinate'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Saarland',
            'slug' => 'saarland',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Saarland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Saxony',
            'slug' => 'saxony',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Saxony'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Saxony-Anhalt',
            'slug' => 'saxony-anhalt',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Saxony-Anhalt'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Schleswig-Holstein',
            'slug' => 'schleswig-holstein',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Schleswig-Holstein'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Thuringia',
            'slug' => 'thuringia',
            'location_type' => 'region',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Thuringia'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Berlin'],
            'name' => 'Berlin',
            'slug' => 'berlin',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Hamburg'],
            'name' => 'Hamburg',
            'slug' => 'hamburg',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Bavaria'],
            'name' => 'Munich',
            'slug' => 'munich',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Cologne',
            'slug' => 'cologne',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Hesse'],
            'name' => 'Frankfurt',
            'slug' => 'frankfurt',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Baden-Württemberg'],
            'name' => 'Stuttgart',
            'slug' => 'stuttgart',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Düsseldorf',
            'slug' => 'dusseldorf',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Saxony'],
            'name' => 'Leipzig',
            'slug' => 'leipzig',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Dortmund',
            'slug' => 'dortmund',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Essen',
            'slug' => 'essen',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Bremen'],
            'name' => 'Bremen',
            'slug' => 'bremen',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Saxony'],
            'name' => 'Dresden',
            'slug' => 'dresden',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Lower Saxony'],
            'name' => 'Hanover',
            'slug' => 'hanover',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Bavaria'],
            'name' => 'Nuremberg',
            'slug' => 'nuremberg',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Duisburg',
            'slug' => 'duisburg',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Bochum',
            'slug' => 'bochum',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Wuppertal',
            'slug' => 'wuppertal',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Bonn',
            'slug' => 'bonn',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Rhine-Westphalia'],
            'name' => 'Münster',
            'slug' => 'munster',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Baden-Württemberg'],
            'name' => 'Karlsruhe',
            'slug' => 'karlsruhe',
            'location_type' => 'city',
            'country_code' => 'DE',
            'locale' => 'de-DE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Canada
        $builder->insert([
            'name' => 'Canada',
            'slug' => 'canada',
            'location_type' => 'country',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'currency' => 'CAD',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Ontario',
            'slug' => 'ontario',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Ontario'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Quebec',
            'slug' => 'quebec',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Quebec'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'British Columbia',
            'slug' => 'british-columbia',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['British Columbia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Alberta',
            'slug' => 'alberta',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Alberta'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Manitoba',
            'slug' => 'manitoba',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Manitoba'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Saskatchewan',
            'slug' => 'saskatchewan',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Saskatchewan'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Nova Scotia',
            'slug' => 'nova-scotia',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Nova Scotia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'New Brunswick',
            'slug' => 'new-brunswick',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['New Brunswick'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Newfoundland and Labrador',
            'slug' => 'newfoundland-and-labrador',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Newfoundland and Labrador'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Prince Edward Island',
            'slug' => 'prince-edward-island',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Prince Edward Island'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Yukon',
            'slug' => 'yukon',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Yukon'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Northwest Territories',
            'slug' => 'northwest-territories',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Northwest Territories'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Nunavut',
            'slug' => 'nunavut',
            'location_type' => 'region',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Nunavut'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'Toronto',
            'slug' => 'toronto',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['British Columbia'],
            'name' => 'Vancouver',
            'slug' => 'vancouver',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Quebec'],
            'name' => 'Montreal',
            'slug' => 'montreal',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Alberta'],
            'name' => 'Calgary',
            'slug' => 'calgary',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Alberta'],
            'name' => 'Edmonton',
            'slug' => 'edmonton',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'Ottawa',
            'slug' => 'ottawa',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Manitoba'],
            'name' => 'Winnipeg',
            'slug' => 'winnipeg',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Quebec'],
            'name' => 'Quebec City',
            'slug' => 'quebec-city',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'Hamilton',
            'slug' => 'hamilton',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Nova Scotia'],
            'name' => 'Halifax',
            'slug' => 'halifax',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['British Columbia'],
            'name' => 'Victoria',
            'slug' => 'victoria',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'London',
            'slug' => 'london',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'Kitchener',
            'slug' => 'kitchener',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'Waterloo',
            'slug' => 'waterloo',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'Mississauga',
            'slug' => 'mississauga',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Ontario'],
            'name' => 'Brampton',
            'slug' => 'brampton',
            'location_type' => 'city',
            'country_code' => 'CA',
            'locale' => 'en-CA',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // France
        $builder->insert([
            'name' => 'France',
            'slug' => 'france',
            'location_type' => 'country',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Île-de-France',
            'slug' => 'ile-de-france',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Île-de-France'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Auvergne-Rhône-Alpes',
            'slug' => 'auvergne-rhone-alpes',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Auvergne-Rhône-Alpes'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Provence-Alpes-Côte d\'Azur',
            'slug' => 'provence-alpes-cote-dazur',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Provence-Alpes-Côte d\'Azur'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Occitanie',
            'slug' => 'occitanie',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Occitanie'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Nouvelle-Aquitaine',
            'slug' => 'nouvelle-aquitaine',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Nouvelle-Aquitaine'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Grand Est',
            'slug' => 'grand-est',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Grand Est'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Pays de la Loire',
            'slug' => 'pays-de-la-loire',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Pays de la Loire'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Bretagne',
            'slug' => 'bretagne',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Bretagne'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Hauts-de-France',
            'slug' => 'hauts-de-france',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Hauts-de-France'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Normandie',
            'slug' => 'normandie',
            'location_type' => 'region',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Normandie'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Île-de-France'],
            'name' => 'Paris',
            'slug' => 'paris',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Auvergne-Rhône-Alpes'],
            'name' => 'Lyon',
            'slug' => 'lyon',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Provence-Alpes-Côte d\'Azur'],
            'name' => 'Marseille',
            'slug' => 'marseille',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Occitanie'],
            'name' => 'Toulouse',
            'slug' => 'toulouse',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Provence-Alpes-Côte d\'Azur'],
            'name' => 'Nice',
            'slug' => 'nice',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Pays de la Loire'],
            'name' => 'Nantes',
            'slug' => 'nantes',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Occitanie'],
            'name' => 'Montpellier',
            'slug' => 'montpellier',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Grand Est'],
            'name' => 'Strasbourg',
            'slug' => 'strasbourg',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Nouvelle-Aquitaine'],
            'name' => 'Bordeaux',
            'slug' => 'bordeaux',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Hauts-de-France'],
            'name' => 'Lille',
            'slug' => 'lille',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Bretagne'],
            'name' => 'Rennes',
            'slug' => 'rennes',
            'location_type' => 'city',
            'country_code' => 'FR',
            'locale' => 'fr-FR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Netherlands
        $builder->insert([
            'name' => 'Netherlands',
            'slug' => 'netherlands',
            'location_type' => 'country',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'North Holland',
            'slug' => 'north-holland',
            'location_type' => 'region',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['North Holland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'South Holland',
            'slug' => 'south-holland',
            'location_type' => 'region',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['South Holland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Utrecht',
            'slug' => 'utrecht',
            'location_type' => 'region',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Utrecht'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'North Brabant',
            'slug' => 'north-brabant',
            'location_type' => 'region',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['North Brabant'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Groningen',
            'slug' => 'groningen',
            'location_type' => 'region',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Groningen'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['North Holland'],
            'name' => 'Amsterdam',
            'slug' => 'amsterdam',
            'location_type' => 'city',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['South Holland'],
            'name' => 'Rotterdam',
            'slug' => 'rotterdam',
            'location_type' => 'city',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['South Holland'],
            'name' => 'The Hague',
            'slug' => 'the-hague',
            'location_type' => 'city',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Utrecht'],
            'name' => 'Utrecht',
            'slug' => 'utrecht',
            'location_type' => 'city',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Brabant'],
            'name' => 'Eindhoven',
            'slug' => 'eindhoven',
            'location_type' => 'city',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Groningen'],
            'name' => 'Groningen',
            'slug' => 'groningen',
            'location_type' => 'city',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Brabant'],
            'name' => 'Tilburg',
            'slug' => 'tilburg',
            'location_type' => 'city',
            'country_code' => 'NL',
            'locale' => 'nl-NL',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Ireland
        $builder->insert([
            'name' => 'Ireland',
            'slug' => 'ireland',
            'location_type' => 'country',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Leinster',
            'slug' => 'leinster',
            'location_type' => 'region',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Leinster'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Munster',
            'slug' => 'munster',
            'location_type' => 'region',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Munster'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Connacht',
            'slug' => 'connacht',
            'location_type' => 'region',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Connacht'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Ulster',
            'slug' => 'ulster',
            'location_type' => 'region',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Ulster'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Leinster'],
            'name' => 'Dublin',
            'slug' => 'dublin',
            'location_type' => 'city',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Munster'],
            'name' => 'Cork',
            'slug' => 'cork',
            'location_type' => 'city',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Munster'],
            'name' => 'Limerick',
            'slug' => 'limerick',
            'location_type' => 'city',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Connacht'],
            'name' => 'Galway',
            'slug' => 'galway',
            'location_type' => 'city',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Munster'],
            'name' => 'Waterford',
            'slug' => 'waterford',
            'location_type' => 'city',
            'country_code' => 'IE',
            'locale' => 'en-IE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Spain
        $builder->insert([
            'name' => 'Spain',
            'slug' => 'spain',
            'location_type' => 'country',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Community of Madrid',
            'slug' => 'community-of-madrid',
            'location_type' => 'region',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Community of Madrid'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Catalonia',
            'slug' => 'catalonia',
            'location_type' => 'region',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Catalonia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Valencian Community',
            'slug' => 'valencian-community',
            'location_type' => 'region',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Valencian Community'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Andalusia',
            'slug' => 'andalusia',
            'location_type' => 'region',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Andalusia'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Basque Country',
            'slug' => 'basque-country',
            'location_type' => 'region',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Basque Country'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Aragon',
            'slug' => 'aragon',
            'location_type' => 'region',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Aragon'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Community of Madrid'],
            'name' => 'Madrid',
            'slug' => 'madrid',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Catalonia'],
            'name' => 'Barcelona',
            'slug' => 'barcelona',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Valencian Community'],
            'name' => 'Valencia',
            'slug' => 'valencia',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Andalusia'],
            'name' => 'Seville',
            'slug' => 'seville',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Basque Country'],
            'name' => 'Bilbao',
            'slug' => 'bilbao',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Andalusia'],
            'name' => 'Málaga',
            'slug' => 'malaga',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Valencian Community'],
            'name' => 'Alicante',
            'slug' => 'alicante',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Aragon'],
            'name' => 'Zaragoza',
            'slug' => 'zaragoza',
            'location_type' => 'city',
            'country_code' => 'ES',
            'locale' => 'es-ES',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Italy
        $builder->insert([
            'name' => 'Italy',
            'slug' => 'italy',
            'location_type' => 'country',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Lazio',
            'slug' => 'lazio',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Lazio'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Lombardy',
            'slug' => 'lombardy',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Lombardy'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Campania',
            'slug' => 'campania',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Campania'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Piedmont',
            'slug' => 'piedmont',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Piedmont'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Tuscany',
            'slug' => 'tuscany',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Tuscany'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Emilia-Romagna',
            'slug' => 'emilia-romagna',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Emilia-Romagna'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Veneto',
            'slug' => 'veneto',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Veneto'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Liguria',
            'slug' => 'liguria',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Liguria'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Sicily',
            'slug' => 'sicily',
            'location_type' => 'region',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Sicily'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Lazio'],
            'name' => 'Rome',
            'slug' => 'rome',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Lombardy'],
            'name' => 'Milan',
            'slug' => 'milan',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Campania'],
            'name' => 'Naples',
            'slug' => 'naples',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Piedmont'],
            'name' => 'Turin',
            'slug' => 'turin',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Tuscany'],
            'name' => 'Florence',
            'slug' => 'florence',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Emilia-Romagna'],
            'name' => 'Bologna',
            'slug' => 'bologna',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Veneto'],
            'name' => 'Venice',
            'slug' => 'venice',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Liguria'],
            'name' => 'Genoa',
            'slug' => 'genoa',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Sicily'],
            'name' => 'Palermo',
            'slug' => 'palermo',
            'location_type' => 'city',
            'country_code' => 'IT',
            'locale' => 'it-IT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Switzerland
        $builder->insert([
            'name' => 'Switzerland',
            'slug' => 'switzerland',
            'location_type' => 'country',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'currency' => 'CHF',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Zurich',
            'slug' => 'zurich',
            'location_type' => 'region',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Zurich'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Geneva',
            'slug' => 'geneva',
            'location_type' => 'region',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Geneva'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Basel-Stadt',
            'slug' => 'basel-stadt',
            'location_type' => 'region',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Basel-Stadt'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Bern',
            'slug' => 'bern',
            'location_type' => 'region',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Bern'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Vaud',
            'slug' => 'vaud',
            'location_type' => 'region',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Vaud'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Lucerne',
            'slug' => 'lucerne',
            'location_type' => 'region',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Lucerne'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Zurich'],
            'name' => 'Zurich',
            'slug' => 'zurich',
            'location_type' => 'city',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Geneva'],
            'name' => 'Geneva',
            'slug' => 'geneva',
            'location_type' => 'city',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Basel-Stadt'],
            'name' => 'Basel',
            'slug' => 'basel',
            'location_type' => 'city',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Bern'],
            'name' => 'Bern',
            'slug' => 'bern',
            'location_type' => 'city',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Vaud'],
            'name' => 'Lausanne',
            'slug' => 'lausanne',
            'location_type' => 'city',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Lucerne'],
            'name' => 'Lucerne',
            'slug' => 'lucerne',
            'location_type' => 'city',
            'country_code' => 'CH',
            'locale' => 'de-CH',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Austria
        $builder->insert([
            'name' => 'Austria',
            'slug' => 'austria',
            'location_type' => 'country',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Vienna',
            'slug' => 'vienna',
            'location_type' => 'region',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Vienna'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Styria',
            'slug' => 'styria',
            'location_type' => 'region',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Styria'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Upper Austria',
            'slug' => 'upper-austria',
            'location_type' => 'region',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Upper Austria'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Salzburg',
            'slug' => 'salzburg',
            'location_type' => 'region',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Salzburg'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Tyrol',
            'slug' => 'tyrol',
            'location_type' => 'region',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Tyrol'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Vienna'],
            'name' => 'Vienna',
            'slug' => 'vienna',
            'location_type' => 'city',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Styria'],
            'name' => 'Graz',
            'slug' => 'graz',
            'location_type' => 'city',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Upper Austria'],
            'name' => 'Linz',
            'slug' => 'linz',
            'location_type' => 'city',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Salzburg'],
            'name' => 'Salzburg',
            'slug' => 'salzburg',
            'location_type' => 'city',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Tyrol'],
            'name' => 'Innsbruck',
            'slug' => 'innsbruck',
            'location_type' => 'city',
            'country_code' => 'AT',
            'locale' => 'de-AT',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Belgium
        $builder->insert([
            'name' => 'Belgium',
            'slug' => 'belgium',
            'location_type' => 'country',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Brussels-Capital Region',
            'slug' => 'brussels-capital-region',
            'location_type' => 'region',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Brussels-Capital Region'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Flanders',
            'slug' => 'flanders',
            'location_type' => 'region',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Flanders'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Wallonia',
            'slug' => 'wallonia',
            'location_type' => 'region',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Wallonia'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Brussels-Capital Region'],
            'name' => 'Brussels',
            'slug' => 'brussels',
            'location_type' => 'city',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Flanders'],
            'name' => 'Antwerp',
            'slug' => 'antwerp',
            'location_type' => 'city',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Flanders'],
            'name' => 'Ghent',
            'slug' => 'ghent',
            'location_type' => 'city',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Flanders'],
            'name' => 'Bruges',
            'slug' => 'bruges',
            'location_type' => 'city',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Flanders'],
            'name' => 'Leuven',
            'slug' => 'leuven',
            'location_type' => 'city',
            'country_code' => 'BE',
            'locale' => 'nl-BE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Sweden
        $builder->insert([
            'name' => 'Sweden',
            'slug' => 'sweden',
            'location_type' => 'country',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'currency' => 'SEK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Stockholm',
            'slug' => 'stockholm',
            'location_type' => 'region',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Stockholm'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Västra Götaland',
            'slug' => 'vastra-gotaland',
            'location_type' => 'region',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Västra Götaland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Skåne',
            'slug' => 'skane',
            'location_type' => 'region',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Skåne'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Uppsala',
            'slug' => 'uppsala',
            'location_type' => 'region',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Uppsala'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Stockholm'],
            'name' => 'Stockholm',
            'slug' => 'stockholm',
            'location_type' => 'city',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Västra Götaland'],
            'name' => 'Gothenburg',
            'slug' => 'gothenburg',
            'location_type' => 'city',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Skåne'],
            'name' => 'Malmö',
            'slug' => 'malmo',
            'location_type' => 'city',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Uppsala'],
            'name' => 'Uppsala',
            'slug' => 'uppsala',
            'location_type' => 'city',
            'country_code' => 'SE',
            'locale' => 'sv-SE',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Norway
        $builder->insert([
            'name' => 'Norway',
            'slug' => 'norway',
            'location_type' => 'country',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'currency' => 'NOK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Oslo',
            'slug' => 'oslo',
            'location_type' => 'region',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Oslo'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Vestland',
            'slug' => 'vestland',
            'location_type' => 'region',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Vestland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Trøndelag',
            'slug' => 'trondelag',
            'location_type' => 'region',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Trøndelag'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Rogaland',
            'slug' => 'rogaland',
            'location_type' => 'region',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Rogaland'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Oslo'],
            'name' => 'Oslo',
            'slug' => 'oslo',
            'location_type' => 'city',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Vestland'],
            'name' => 'Bergen',
            'slug' => 'bergen',
            'location_type' => 'city',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Trøndelag'],
            'name' => 'Trondheim',
            'slug' => 'trondheim',
            'location_type' => 'city',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Rogaland'],
            'name' => 'Stavanger',
            'slug' => 'stavanger',
            'location_type' => 'city',
            'country_code' => 'NO',
            'locale' => 'no-NO',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Denmark
        $builder->insert([
            'name' => 'Denmark',
            'slug' => 'denmark',
            'location_type' => 'country',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'currency' => 'DKK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Capital Region',
            'slug' => 'capital-region',
            'location_type' => 'region',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Capital Region'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Central Denmark Region',
            'slug' => 'central-denmark-region',
            'location_type' => 'region',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Central Denmark Region'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Region of Southern Denmark',
            'slug' => 'region-of-southern-denmark',
            'location_type' => 'region',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Region of Southern Denmark'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'North Denmark Region',
            'slug' => 'north-denmark-region',
            'location_type' => 'region',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['North Denmark Region'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Capital Region'],
            'name' => 'Copenhagen',
            'slug' => 'copenhagen',
            'location_type' => 'city',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Central Denmark Region'],
            'name' => 'Aarhus',
            'slug' => 'aarhus',
            'location_type' => 'city',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Region of Southern Denmark'],
            'name' => 'Odense',
            'slug' => 'odense',
            'location_type' => 'city',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Denmark Region'],
            'name' => 'Aalborg',
            'slug' => 'aalborg',
            'location_type' => 'city',
            'country_code' => 'DK',
            'locale' => 'da-DK',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Finland
        $builder->insert([
            'name' => 'Finland',
            'slug' => 'finland',
            'location_type' => 'country',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'currency' => 'EUR',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Uusimaa',
            'slug' => 'uusimaa',
            'location_type' => 'region',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Uusimaa'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Pirkanmaa',
            'slug' => 'pirkanmaa',
            'location_type' => 'region',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Pirkanmaa'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Southwest Finland',
            'slug' => 'southwest-finland',
            'location_type' => 'region',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Southwest Finland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'North Ostrobothnia',
            'slug' => 'north-ostrobothnia',
            'location_type' => 'region',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['North Ostrobothnia'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Uusimaa'],
            'name' => 'Helsinki',
            'slug' => 'helsinki',
            'location_type' => 'city',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Uusimaa'],
            'name' => 'Espoo',
            'slug' => 'espoo',
            'location_type' => 'city',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Pirkanmaa'],
            'name' => 'Tampere',
            'slug' => 'tampere',
            'location_type' => 'city',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Southwest Finland'],
            'name' => 'Turku',
            'slug' => 'turku',
            'location_type' => 'city',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['North Ostrobothnia'],
            'name' => 'Oulu',
            'slug' => 'oulu',
            'location_type' => 'city',
            'country_code' => 'FI',
            'locale' => 'fi-FI',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // New Zealand
        $builder->insert([
            'name' => 'New Zealand',
            'slug' => 'new-zealand',
            'location_type' => 'country',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'currency' => 'NZD',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $countryId = $db->insertID();

        $regionIds = [];
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Auckland',
            'slug' => 'auckland',
            'location_type' => 'region',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Auckland'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Wellington',
            'slug' => 'wellington',
            'location_type' => 'region',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Wellington'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Canterbury',
            'slug' => 'canterbury',
            'location_type' => 'region',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Canterbury'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Waikato',
            'slug' => 'waikato',
            'location_type' => 'region',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Waikato'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Bay of Plenty',
            'slug' => 'bay-of-plenty',
            'location_type' => 'region',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Bay of Plenty'] = $db->insertID();
        $builder->insert([
            'parent_id' => $countryId,
            'name' => 'Otago',
            'slug' => 'otago',
            'location_type' => 'region',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $regionIds['Otago'] = $db->insertID();

        $builder->insert([
            'parent_id' => $regionIds['Auckland'],
            'name' => 'Auckland',
            'slug' => 'auckland',
            'location_type' => 'city',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Wellington'],
            'name' => 'Wellington',
            'slug' => 'wellington',
            'location_type' => 'city',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Canterbury'],
            'name' => 'Christchurch',
            'slug' => 'christchurch',
            'location_type' => 'city',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Waikato'],
            'name' => 'Hamilton',
            'slug' => 'hamilton',
            'location_type' => 'city',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Bay of Plenty'],
            'name' => 'Tauranga',
            'slug' => 'tauranga',
            'location_type' => 'city',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $builder->insert([
            'parent_id' => $regionIds['Otago'],
            'name' => 'Dunedin',
            'slug' => 'dunedin',
            'location_type' => 'city',
            'country_code' => 'NZ',
            'locale' => 'en-NZ',
            'status' => 'draft',
            'is_indexable' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
