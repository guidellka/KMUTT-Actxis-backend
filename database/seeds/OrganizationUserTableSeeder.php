<?php

use Illuminate\Database\Seeder;

class OrganizationUserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('organization_users')->insert([
            [
                'user_id' => 9,
                'organization_id' => 1,
            ],
            [
                'user_id' => 10,
                'organization_id' => 2,
            ],
            [
                'user_id' => 11,
                'organization_id' => 3,
            ],
        ]);
    }
}
