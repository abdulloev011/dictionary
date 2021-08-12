<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->truncate();
        $words = [
            //На А
            ['tajik' => 'а','english'=>'the first letter of Tajik alphabet'],
            ['tajik' => 'абад','english'=>'(n.) eternity; то ~ eternity'],
            ['tajik' => 'абадӣ','english'=>'(adj.) 1 eternal хотираи ~ eternal memory; ~ шудан to be immortalized; ~ кардан (намудан, гардонидан) to immortalize; 2 (adj.) forever'],
            ['tajik' => 'абадзинда','english'=>'(adv.) eternally; (in negative constructions)'],
            ['tajik' => 'абарқудрат','english'=>'(n.) powerful; кишварҳои ~ powerful countries'],
            ['tajik' => 'абр','english'=>'cloud'],
            ['tajik' => 'абрешим','english'=>'silk'],
            ['tajik' => 'абрешимбоф','english'=>'silk weaver'],
            ['tajik' => 'абрнок','english'=>'cloudy'],
            ['tajik' => 'абрпўш','english'=>'(adj.)cloudy'],
            ['tajik' => 'абрў','english'=>'eyebrow'],
            ['tajik' => 'авангард','english'=>' avant-garde'],
            ['tajik' => 'авбош','english'=>'(n.) vagrant; hooligan; dolt; riff-raff'],
            ['tajik' => 'август','english'=>'August'],
            ['tajik' => 'аврупо','english'=>'Europe'],

            //На Б
            ['tajik' => 'Б','english'=>'second letter of Tajik alphabet'],
            ['tajik' => 'баандом','english'=>'1 (adj.) slender; having good figure; beautiful; 2 (adv.) nicely; tastefully'],
            ['tajik' => 'баақл','english'=>'intelligent'],
            ['tajik' => 'бабр','english'=>'leopard, tiger'],
            ['tajik' => 'бавосита','english'=>'(adj.) indirect; oblique; саволи ~ indirect question; пуркунандаи ~ indirect object (in grammar)'],
            ['tajik' => 'бағайрат','english'=>'initiative'],
            ['tajik' => 'бадан','english'=>'(n.) body; torso; тарбияи ~ physical education'],
            ['tajik' => 'бадарға','english'=>'(n.) exile; banishment; ~ кардан (намудан) to exile; to banish; ~ шудан to be exiled; to be banished'],
            ['tajik' => 'бадахлоқ','english'=>'immoral; depraved'],
            ['tajik' => 'бадафт','english'=>'ugly'],
            ['tajik' => 'бадаступо','english'=>'agile; skillful'],
            ['tajik' => 'бадбахтона','english'=>'unfortunately'],
            ['tajik' => 'бадбахтӣ','english'=>'misfortune; bad luck; trouble; adversity'],
            ['tajik' => 'бадбўӣ','english'=>'stench'],
            ['tajik' => 'бадеӣ','english'=>'artistic; pertaining to art'],
        ];
        foreach ($words as $w){
            DB::table('words')->insert($w);
        }
    }
}
