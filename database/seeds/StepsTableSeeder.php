<?php

use Illuminate\Database\Seeder;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([
            'name' => 'อาจารย์ที่ปรึกษา'
        ]);
        
        DB::table('steps')->insert([
            'name' => 'องค์การนักศึกษา'
        ]);
        
        DB::table('steps')->insert([
            'name' => 'สภานักศึกษา'
        ]);
        
        DB::table('steps')->insert([
            'name' => 'กองกิจการนักศึกษา'
        ]);
    }
}
