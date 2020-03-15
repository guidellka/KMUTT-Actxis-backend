<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('documents')->insert([
            [
                'owner_id' => 8,
                'advisor_id' => 1,
                'club_id' => 9,
                'document_category_id' => 1,
                'name' => 'เส้นทางฝันสู้หนทางไอที ครั้งที่ 12',
                'name_en' => 'Ways to IT Professionals Camp 12',
                'file_name' => 'temp.pdf',
                'start_at' => '2020-04-15 09:00:00',
                'end_at' => '2020-04-15 20:00:00',
                'purpose_budget' => 14000,
                'real_budget' => null,
            ],
            [
                'owner_id' => 8,
                'advisor_id' => 2,
                'club_id' => 4,
                'document_category_id' => 1,
                'name' => 'ค่ายอาสาพัฒนาชุมชน',
                'name_en' => null ,
                'file_name' => 'test.pdf',
                'start_at' => '2020-05-15 09:00:00',
                'end_at' => '2020-05-18 20:00:00',
                'purpose_budget' => 25000,
                'real_budget' => null,
            ],
        ]);
    }
}
