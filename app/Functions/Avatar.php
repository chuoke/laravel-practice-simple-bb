<?php

namespace App\Functions;

use Illuminate\Support\Arr;

class Avatar
{
    public static function make($params, $size = 100)
    {
        return rand(0, 10) % 2
                ? self::makeFromRobohash($params, $size)
                : self::makeFromDicebear($params, $size);
    }

    public static function makeFromRobohash($params, $size = 100)
    {
        $host = "https://robohash.org/";

        $sets = ['set1', 'set2', 'set3', 'set4'];
        shuffle($sets);
        $set = Arr::get($params, 'set', reset($sets));

        $hash = self::hash($params);

        return $host . "$hash.png?set=$set&size={$size}x{$size}";
    }

    public static function makeFromDicebear($params, $size = 100)
    {
        $host = "https://avatars.dicebear.com/v2/";

        $sprites = ['male', 'female', 'identicon', 'gridy', 'avataaars', 'jdenticon'];
        shuffle($sprites);
        $sprite = Arr::get($params, 'sprite', reset($sprites));

        $moods = ['happy', 'sad', 'surprised', ''];
        shuffle($moods);
        $mood = Arr::get($params, 'mood', reset($moods));

        $hash = self::hash($params);

        return $host . "$sprite/$hash.svg" . ( $mood ? "?options[mood][]=$mood" : '' );
    }

    public static function hash($param)
    {
        return md5(strtolower(trim(($param ? $param : params::random()).time())));
    }
}
