<?php


namespace Database\Seeders;

use App\Enums\Unit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->insert([
            [
                'id' => 1,
                'user_id' => 2, // 1 admin
                'title' => 'I want to hitchhike',
                'content' => 'help me'
            ],
            [
                'id' => 2,
                'user_id' => 3,
                'title' => 'My model is broken',
                'content' => 'help me'
            ],
            [
                'id' => 3,
                'user_id' => 4,
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
            [
                'id' => 5,
                'user_id' => 4,
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'title' => 'I do not have a model',
                'content' => 'help me'
            ],
        ]);
    }
}
