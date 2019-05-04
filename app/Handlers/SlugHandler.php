<?php

namespace App\Handlers;

use Overtrue\Pinyin\Pinyin;

class SlugHandler
{
    public function english($text)
    {
        $translator = new TranslateHandler();
        $translated = $translator->translate($text);
        if (empty($translated)) {
            return $this->pinyin($text);
        }

        return str_slug($translated);
    }

    public function pinyin($text)
    {
        return str_slug(app(Pinyin::class)->permalink($text));
    }
}