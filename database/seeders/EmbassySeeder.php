<?php

namespace Database\Seeders;

use App\Models\Embassy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmbassySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $embassies =[
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Австрия', 'email'=>'tajembvienna@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Амороти Муттаҳидаи Арабӣ', 'email'=>'tajembabudhabi@mfa.tj'],
            ['name'=>'Консулгарии генералии Ҷумҳурии Тоҷикистон дар Дубай', 'email'=>'tajconsdubai@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Подшоҳии Арабистони Саудӣ', 'email'=>'tajembsaudi@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Исломии Афғонистон', 'email'=>'tajembkabul@mfa.tj'],
            ['name'=>'Консулгарии Ҷумҳурии Тоҷикистон дар Мазори Шариф', 'email'=>'tajconsmazarisharif@mfa.tj'],
            ['name'=>'Консулгарии Ҷумҳурии Тоҷикистон дар шаҳри Файзобод', 'email'=>'tajconsfayzobod@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Беларус', 'email'=>'tajembminsk@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Шоҳигарии Белгия', 'email'=>'tajembbrussels@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Шоҳигарии Муттаҳидаи Британияи Кабир ва Ирландияи Шимолӣ', 'email'=>' tajemblondon@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Иёлоти Муттаҳидаи Амрико', 'email'=>'tajemus@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Давлати Кувайт', 'email'=>'tajembkuwait@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Малайзия', 'email'=>'tajembmy@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Мисри Араб', 'email'=>'tajembcairo@mfa.tj'],
            ['name'=>'Намояндагии Тоҷикистон дар СММ', 'email'=>'tajikistanun@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Озарбойҷон', 'email'=>'tajembbaku@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Федеративии Олмон', 'email'=>'tajembberlin@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Исломии Покистон', 'email'=>'tajemb_Islamabad@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Федератсияи Русия', 'email'=>'tajembmoscow@mfa.tj'],
            ['name'=>'Консулгарии генералии Ҷумҳурии Тоҷикистон дар Санкт Петербург, Русия', 'email'=>'tajgencons.piter@mfa.tj'],
            ['name'=>'Консулгарии генералии Ҷумҳурии Тоҷикистон дар Новосибирск, Русия', 'email'=>'tajgencons.nsk@mfa.tj'],
            ['name'=>'Консулгарии генералии Ҷумҳурии Тоҷикистон дар Екатеринбург, Русия', 'email'=>'tajconsek@mfa.tj'],
            ['name'=>'Консулгарии генералии Ҷумҳурии Тоҷикистон дар Уфа, Русия', 'email'=>'tajconsufa@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Туркия', 'email'=>'tajembankara@mfa.tj'],
            ['name'=>'Консулгарии генералии Ҷумҳурии Тоҷикистон дар шаҳри Истанбул', 'email'=>' tajconsistanbul@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Туркманистон', 'email'=>'tajembashgabat@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Ӯзбекистон', 'email'=>'tajembuz@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Украина', 'email'=>'tajembkyiv@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Фаронса', 'email'=>'tajembparis@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Мардумии Чин', 'email'=>'tajembbeijing@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Конфедератсияи Швейтсария', 'email'=>'tajembgeneva@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Исломии Эрон', 'email'=>'tajembtehran@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Қазоқистон', 'email'=>'tajembastana@mfa.tj'],
            ['name'=>'Консулгарии генералии Ҷумҳурии Тоҷикистон дар ш. Алмаато', 'email'=>'tajconsalmaty@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Давлати Қатар', 'email'=>'tajemqatar@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Қирғизистон', 'email'=>'tjemb.kg@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Ҳиндустон', 'email'=>'tajembnewdelhi@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷопон', 'email'=>'tajembtokyo@mfa.tj'],
            ['name'=>'Сафорати Ҷумҳурии Тоҷикистон дар Ҷумҳурии Корея', 'email'=>'tjkoreaemb@mfa.tj'],
        ];

        foreach ($embassies as $embassy){
            Embassy::create($embassy);
        }
    }
}
