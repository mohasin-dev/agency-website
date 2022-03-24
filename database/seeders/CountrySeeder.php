<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'id' => '1',
                'name' => 'Saudi Arabiya',
                'short_description' => 'Beautiful Country',
                'image' => 'country/saudi-arabiya.jpg',
            ],
            [
                'id' => '2',
                'name' => 'Qatar',
                'short_description' => 'Beautiful Country',
                'image' => 'country/qatar.jpg',
            ],
            [
                'id' => '3',
                'name' => 'Dubai',
                'short_description' => 'Beautiful Country',
                'image' => 'country/dubai.jpeg',
            ],
            [
                'id' => '4',
                'name' => 'Oman',
                'short_description' => 'Beautiful Country',
                'image' => 'country/oman.jpg',
            ],
        ]);
    }
}
