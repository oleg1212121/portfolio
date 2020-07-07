<?php

namespace App\Http\CustomServices;


use App\Models\Word;

class TranslatorService
{
    protected const YANDEX_DICTIONARY_KEY = 'dict.1.1.20200419T120019Z.6b7d74f7cbf02b08.af5f55b9ba49a27a2a0477a93e3b98e849c8754a';
    protected const YANDEX_API_KEY = 'trnsl.1.1.20200419T115713Z.2c06323c87a2a74c.5db36cbb04ef37513da3f21a09867a03b4039249';
    protected const YANDEX_DICTIONARY_URL = 'https://dictionary.yandex.net/api/v1/dicservice.json/lookup';
    protected const YANDEX_API_URL = 'https://translate.yandex.net/api/v1.5/tr.json/translate';
    protected const LANG = 'en-ru';


    /**
     * Принимает 1 параметр text, возвращает варианты перевода из словаря (отдельное слово)
     *
     * @param string $word
     * @return string
     */
    public static function getYandexDictionaryTranslate(string $word = '') :string
    {
        $url = static::YANDEX_DICTIONARY_URL.'?text=' . $word . '&lang='.static::LANG.'&key='. static::YANDEX_DICTIONARY_KEY;
        $result = (json_decode(file_get_contents($url)))->def ?? [];

        $res = '';

        foreach ($result as $k => $def) {
            $res .= ($k + 1) . '. ';
            foreach ($def->tr as $j => $tr) {
                if ($j < 3) {
                    if ($j > 0) {
                        $res .= ', ' . $tr->text;
                    } else {
                        $res .= $tr->text;
                    }
                }
            }
            $res .= ' ';
        }

        return $res;
    }


    /**
     * Перевод текста, может принимать множество параметров text
     *
     * @param array $words
     * @return array
     */
    public static function getYandexApiTranslate(array $words = []) :array
    {

        $text = implode('&text=', $words);

        $url = static::YANDEX_API_URL.'?format=plain&text=' . $text . '&lang=' . static::LANG . '&key=' . static::YANDEX_API_KEY;

        $result = (json_decode(file_get_contents($url)))->text ?? [];


        return $result;
    }
}