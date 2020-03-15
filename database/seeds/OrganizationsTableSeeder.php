<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('organizations')->insert([
            [
                'name' => 'องค์การนักศึกษา',
            ],
            [
                'name' => 'สภานักศึกษา',
            ],
            [
                'name' => 'กองกิจการนักศึกษา',
            ],
        ]);
    }
}
