<?php

use Illuminate\Database\Seeder;

class DocumentStepTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('document_steps')->insert([
            [
                'document_id' => 1,
                'category_step_id' => 1,
                'inspector_id' => 1,
                'status' => 'รอตรวจสอบ',
            ],
            [
                'document_id' => 2,
                'category_step_id' => 1,
                'inspector_id' => 2,
                'status' => 'เสร็จสิ้น',
            ],
            [
                'document_id' => 2,
                'category_step_id' => 2,
                'inspector_id' => 9,
                'status' => 'เสร็จสิ้น',
            ],
            [
                'document_id' => 2,
                'category_step_id' => 2,
                'inspector_id' => 10,
                'status' => 'รอตรวจสอบ',
            ],
        ]);
    }
}
