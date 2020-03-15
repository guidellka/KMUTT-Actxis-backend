<?php

use Illuminate\Database\Seeder;

class StepsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('steps')->insert([
            [
                'name' => 'อาจารย์ที่ปรึกษา'
            ],
            [
                'name' => 'องค์การนักศึกษา'
            ],
            [
                'name' => 'สภานักศึกษา'
            ],
            [
                'name' => 'กองกิจการนักศึกษา'
            ],
        ]);
    }
}
