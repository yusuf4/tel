<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['name'=>'Роҳбарият', 'email'=>'info@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Гурӯҳи сафирони супоришҳои махсус', 'email'=>'amb@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Сарраёсати консулӣ', 'email'=>'info@consular.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати кадрҳо', 'email'=>'hrdep@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати кишварҳои Аврупо ва Америка', 'email'=>'deac@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати кишварҳои Ховари Миёна ва Африқо', 'email'=>'dmea@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати кишварҳои Осиё ва Уқёнуси Ором', 'email'=>'daps@mfa.tjj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати кишварҳои Иттиҳоди Давлатҳои Мустақил', 'email'=>'depcis@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати таҳқиқоти стратегӣ', 'email'=>'dss@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати созмонҳои байналмилалӣ', 'email'=>'dio@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати ҳамкориҳои иқтисодии хориҷӣ', 'email'=>'execdep@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати шартномавӣ-ҳуқуқӣ', 'email'=>'legaldepartment@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати ташрифоти давлатӣ', 'email'=>'protocol@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати иттилоот ва матбуот', 'email'=>'informdepartment@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати иттилооти умумӣ ва алоқаи дипломатӣ', 'email'=>'info@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати молиявӣ', 'email'=>'vfu@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Раёсати корҳо', 'email'=>'dm@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Котибот', 'email'=>'assistant@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Шуъбаи Комиссияи миллии ЮНЕСКО', 'email'=>'unesco@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Шуъбаи ҳалли масъалаҳои ҳудудӣ ва сарҳадӣ', 'email'=>'border@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Шуъбаи Созмони ҳамкории Шанхай', 'email'=>'sco@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Шуъбаи технологияҳои иттилоотӣ ва коммуникатсионӣ', 'email'=>'itd@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Шуъбаи тарҷума', 'email'=>'info@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'Шуъбаи сохтмон', 'email'=>'info@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'МАРКАЗИ ТАКМИЛИ ИХТИСОС ВА БОЗОМӮЗӢ', 'email'=>'catrdp@mfa.tj', 'dastgoh'=>'1'],
            ['name'=>'НУҚТАИ МУҲОФИЗИН', 'email'=>'info@mfa.tj', 'dastgoh'=>'1'],

        ];

        foreach ($departments as $department){
            Department::create($department);
        }
    }
}
