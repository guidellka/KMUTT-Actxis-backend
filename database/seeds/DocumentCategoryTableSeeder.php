<?php

use Illuminate\Database\Seeder;

class DocumentCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_category')->insert([
            'name' => 'แบบเสนอโครงการ'
        ]);

        DB::table('document_category')->insert([
            'name' => 'แบบสรุปโครงการ'
        ]);
    }
}
