<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'name' => 'กองกิจการนักศึกษา',
        ]);

        DB::table('organizations')->insert([
            'name' => 'องค์การนักศึกษา',
        ]);

        DB::table('organizations')->insert([
            'name' => 'สภานักศึกษา',
        ]);
    }
}
