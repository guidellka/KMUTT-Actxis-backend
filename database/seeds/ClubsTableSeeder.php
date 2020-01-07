<?php

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert([
                'name' => 'ชมรมดนตรีสากล'
            ]);

        DB::table('clubs')->insert([
            'name' => 'ชมรมพุทธศาสตร์',
        ]);

        DB::table('clubs')->insert([
            'name' => 'ชมรมฟุตซอล',
        ]);

        DB::table('clubs')->insert([
            'name' => 'ชมรมอาสาพัฒนาชนบท',
        ]);

        DB::table('clubs')->insert([
            'name' => 'ชมรมหุ่นยนต์',
        ]);

        DB::table('clubs')->insert([
            'name' => 'ชมรมฟอร์มูล่า',
        ]);

        DB::table('clubs')->insert([
            'name' => 'สโมสรนักศึกษาคณะเทคโนโลยีสารสนเทศ',
        ]);
    }
}
