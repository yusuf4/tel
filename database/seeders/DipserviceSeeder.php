<?php

namespace Database\Seeders;

use App\Models\Dipservice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DipserviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments=[
            ['name'=>'Роҳбарият', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шӯъбаи кадрҳо ва иттилооти умумӣ', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Раёсати молия', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шӯъбаи баҳисобгирии моддӣ', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шӯъбаи тиҷорат ва рушд', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Раёсати хизматрасонӣ', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шӯъбаи амволи ғайриманқул', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шўъбаи хизматрасонӣ', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шўъбаи табъу нашр ва дизайн', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Раёсати бақайдгирӣ', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шӯъбаи бақайдгирии воситаҳои нақлиёт', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шӯъбаи бақайдгирии шаҳрвандон', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
            ['name'=>'Шӯъбаи корҳо', 'email'=>'test@mfa.tj', 'dastgoh'=>'2'],
        ];

        foreach ($departments as $department){
            Dipservice::create($department);
        }
    }
}
