<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;
class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price')->insert([
            'price' => 2562.2,
            'margin' => 0.062,
            'created_at' => Carbon::create('2016-01-23 11:53:20'),

        ]);
        DB::table('price')->insert([
            'price' => 1560.0,
            'margin' => 0.066,
            'created_at' => Carbon::create('2016-01-24 11:53:20'),

        ]);
        DB::table('price')->insert([
            'price' => 3000,
            'margin' => 0.053,
            'created_at' => Carbon::create('2016-01-25 11:53:20'),
        ]);
        DB::table('price')->insert([
            'price' => 1500.42,
            'margin' => 0.065,
            'created_at' => Carbon::create('2016-01-26 11:53:20'),

        ]);
        DB::table('price')->insert([
            'price' => 1700.42,
            'margin' => 0.033,
            'created_at' => Carbon::create('2016-01-27 11:53:20'),

        ]);

    }
}
