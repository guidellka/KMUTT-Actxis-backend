<?php

use Illuminate\Database\Seeder;

class BudgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('budgets')->insert([
            'club_id' => 1,
            'edu_year' => 2019,
            'budget' => 48000,
        ]);
    }
}
