<?php


namespace Database\Seeders;

use App\Enums\RideStatus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rides')->insert([
            [
                'id' => 1,
                'car_id' => 2,
                'travel_start_time' => '2021-04-27 10:10',
                'origin_address' => '70 nguyen hoang, my dinh 2, ha noi',
                'destination_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'distance' => 850,
                'seats_available' => 4,
                'status' => RideStatus::PENDING,
                'price_total'=>100,
            ],
            [
                'id' => 2,
                'car_id' => 3,
                'travel_start_time' => '2021-04-27 10:10',
                'origin_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'destination_address' => 'mui ne, ca mau',
                'distance' => 850,
                'seats_available' => 4,
                'status' => RideStatus::PENDING,
                'price_total'=>100,
            ],
            [
                'id' => 3,
                'car_id' => 4,
                'travel_start_time' => '2021-04-27 10:10',
                'origin_address' => 'ngo 83/87 duong tan trieu moi, thanh xuan ha noi',
                'destination_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'distance' => 850,
                'seats_available' => 4,
                'status' => RideStatus::PENDING,
                'price_total'=>100,
            ],
            [
                'id' => 4,
                'car_id' => 4,
                'travel_start_time' => '2021-04-27 10:10',
                'origin_address' => '1000 duong lang, cau giay, ha noi',
                'destination_address' => 'so 8 ton that thuyet, my dinh, ha noi',
                'distance' => 850,
                'seats_available' => 4,
                'status' => RideStatus::PENDING,
                'price_total'=>100,
            ]
        ]);
    }
}
