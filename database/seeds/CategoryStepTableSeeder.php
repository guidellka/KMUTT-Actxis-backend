<?php

use Illuminate\Database\Seeder;

class CategoryStepTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_steps')->insert([
            [
                'category_id' => 1,
                'step_id' => 1,
                'order' => 1,
            ],
            [
                'category_id' => 1,
                'step_id' => 2,
                'order' => 2,
            ],
            [
                'category_id' => 1,
                'step_id' => 3,
                'order' => 3,
            ],
            [
                'category_id' => 1,
                'step_id' => 4,
                'order' => 4,
            ],
        ]);
    }
}
