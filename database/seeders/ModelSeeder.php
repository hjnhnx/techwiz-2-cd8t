<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([
            [
                'id' => 1,
                'make' => 'VINFAST LUX SA2.0', // hang xe
                'model' => 'SUV',// dong xe
                'make_year' => 2020
            ],
            [
                'id' => 2,
                'make' => 'VINFAST LUX A2.0', // hang xe
                'model' => 'Sedan',// dong xe
                'make_year' => 2020
            ],
            [
                'id' => 3,
                'make' => '530 M Sport', // hang xe
                'model' => 'Sedan',// dong xe
                'make_year' => 2021
            ],
            [
                'id' => 4,
                'make' => 'BMW X5 xDrive40i MSport', // hang xe
                'model' => 'SUV',// dong xe
                'make_year' => 2021
            ],
            [
                'id' => 5,
                'make' => 'BMW Z4 sDrive30i M-Sport', // hang xe
                'model' => 'Coupe',// dong xe
                'make_year' => 2021
            ]
        ]);
    }
}
