<?php

use Illuminate\Database\Seeder;

class DocumentCategoryTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('document_categories')->insert([
            [
                'name' => 'แบบเสนอโครงการ',
            ],
            [
                'name' => 'แบบสรุปโครงการ',
            ],
        ]);
       
    }
}
