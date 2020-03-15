<?php

use Illuminate\Database\Seeder;

class UserDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_data')->insert([
            [
                'user_id' => 1,
                'first_name' => 'สยาม',
                'last_name' => 'แย้มแสงสังข์',
                'email' => 'siam@sit.kmutt.ac.th',
                'tel_no' => '0985787778',
                'is_lecturer' => true
            ],
            [
                'user_id' => 2,
                'first_name' => 'สนิท',
                'last_name' => 'ศิริสวัสดิ์วัฒนา',
                'email' => 'sanit@sit.kmutt.ac.th',
                'tel_no' => '0909090009',
                'is_lecturer' => true
            ],
            [
                'user_id' => 3,
                'first_name' => 'อุมาพร',
                'last_name' => 'สุภสิทธิเมธี',
                'email' => 'umaporn@sit.kmutt.ac.th',
                'tel_no' => '0998667562',
                'is_lecturer' => true
            ],
            [
                'user_id' => 4,
                'first_name' => 'ไพรสันต์',
                'last_name' => 'ผดุงเวียง',
                'email' => 'praisan.pad@sit.kmutt.ac.th',
                'tel_no' => '0875667654',
                'is_lecturer' => true
            ],
            [
                'user_id' => 5,
                'first_name' => 'สุณิสา',
                'last_name' => 'สถาพรวจนา',
                'email' => 'sunisa@sit.kmutt.ac.th',
                'tel_no' => '0989899999',
                'is_lecturer' => true
            ],
            [
                'user_id' => 6,
                'first_name' => 'สุเมธ',
                'last_name' => 'อังคะศิริกุล',
                'email' => 'sumet@sit.kmutt.ac.th',
                'tel_no' => '0897888921',
                'is_lecturer' => true
            ],
            [
                'user_id' => 7,
                'first_name' => 'อัจฉรา',
                'last_name' => 'ธารอุไรกุล',
                'email' => 'achara@sit.kmutt.ac.th',
                'tel_no' => '024709858',
                'is_lecturer' => true
            ],
        ]);

        DB::table('user_data')->insert([
            [
                'user_id' => 8,
                'student_id' => '59130500015',
                'department' => 'เทคโนโลยีสารสนเทศ',
                'branch' => 'เทคโนโลยีสารสนเทศ',
                'first_name' => 'ชนาภา',
                'last_name' => 'ชูวิเศษวณิชย์',
                'email' => 'chanapa.guidellka@mail.kmutt.ac.th',
                'tel_no' => '0902375848',
                'is_lecturer' => false
            ],
            [
                'user_id' => 9,
                'student_id' => '59130500022',
                'department' => 'เทคโนโลยีสารสนเทศ',
                'branch' => 'วิทยาการคอมพิวเตอร์',
                'first_name' => 'คุนันญา',
                'last_name' => 'ประเทืองกิจ',
                'email' => 'kunanya.patin@mail.kmutt.ac.th',
                'tel_no' => '0903334521',
                'is_lecturer' => false
            ],
            [
                'user_id' => 10,
                'student_id' => '59130500062',
                'department' => 'เทคโนโลยีสารสนเทศ',
                'branch' => 'วิทยาการคอมพิวเตอร์',
                'first_name' => 'ภรณ์วรัตน์',
                'last_name' => 'สุวิชาชนันทร์',
                'email' => 'pornvarat.jamiiz@mail.kmutt.ac.th',
                'tel_no' => '0908765678',
                'is_lecturer' => false
            ],
        ]);

        DB::table('user_data')->insert([
            [
                'user_id' => 11,
                'first_name' => 'อนุสรณ์',
                'last_name' => 'จำปีเรือง',
                'email' => 'anusorn.jam@kmutt.ac.th',
                'tel_no' => '024708101 ',
                'is_lecturer' => false
            ],
        ]);
    }
}
