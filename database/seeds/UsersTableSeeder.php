<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'lec06'
            ],
            [
                'username' => 'lec07'
            ],
            [
                'username' => 'mock_lec_1'
            ],
            [
                'username' => 'mock_lec_2'
            ],
            [
                'username' => 'mock_lec_3'
            ],
            [
                'username' => 'mock_lec_4'
            ],
            [
                'username' => 'mock_lec_5'
            ],
            [
                'username' => 'std16'
            ],
            [
                'username' => 'std20'
            ],
            [
                'username' => 'std23'
            ], 
            [
                'username' => 'lec08'
            ],
        ]);

    }
}
