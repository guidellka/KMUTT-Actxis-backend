<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClubsTableSeeder::class,
            BudgetsTableSeeder::class,
            OrganizationsTableSeeder::class,
            StepsTableSeeder::class,
            DocumentCategoryTableSeeder::class,
        ]);
    }
}
