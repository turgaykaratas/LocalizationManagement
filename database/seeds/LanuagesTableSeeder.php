<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanuagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'code' => 'us',
                'name' => 'ABD'
            ],
            [
                'code' => 'af',
                'name' => 'Afganistan'
            ],
            [
                'code' => 'ci',
                'name' => 'Fildişi Sahili'
            ],
            [
                'code' => 'gh',
                'name' => 'Gana'
            ],
            [
                'code' => 'en',
                'name' => 'İngiltere'
            ],
            [
                'code' => 'ph',
                'name' => 'Fransa'
            ],
            [
                'code' => 'kr',
                'name' => 'Güney Kore'
            ],
            [
                'code' => 'ch',
                'name' => 'İsviçre'
            ],
            [
                'code' => 'th',
                'name' => 'Tayland'
            ],
            [
                'code' => 'ua',
                'name' => 'Ukrayna'
            ],
            [
                'code' => 'nc',
                'name' => 'Yeni Kaledonya'
            ],
            [
                'code' => 'nz',
                'name' => 'Yeni Zellanda'
            ],
            [
                'code' => 'sa',
                'name' => 'Suudi Arabistan'
            ],
            [
                'code' => 'no',
                'name' => 'Norveç'
            ],
            [
                'code' => 'eg',
                'name' => 'Mısır'
            ],
            [
                'code' => 'hu',
                'name' => 'Macaristan'
            ],
            [
                'code' => 'jp',
                'name' => 'Japonya'
            ],
            [
                'code' => 'it',
                'name' => 'İtalya'
            ],
            [
                'code' => 'nl',
                'name' => 'Hollanda'
            ],
            [
                'code' => 'br',
                'name' => 'Brezilya'
            ]
        ];

        foreach ($languages as $key => $value) {
            Language::create($value);
        }
    }
}
