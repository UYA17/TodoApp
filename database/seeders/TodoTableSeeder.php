<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => "旅行",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('Todo')->insert($param);

        $param = [
            'content' => "勉強",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('Todo')->insert($param);

        $param = [
            'content' => "買い物",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('todo')->insert($param);
    }
}