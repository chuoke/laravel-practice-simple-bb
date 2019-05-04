<?php

namespace App\Handlers;

use GuzzleHttp\Client;

class TranslateHandler
{
    protected $api;
    
    public function translate($text, $fail_to_pinyin = true)
    {
        $http = new Client();

        // https://fanyi-api.baidu.com/api/trans/vip/translate
        $api = 'http://api.fanyi.baidu.com/api/trans/vip/translate?';
        $appid = config('services.baidu_translate.appid');
        $key = config('services.baidu_translate.key');

        if (empty($appid) || empty($key)) {
            return '';
        }
        
        $salt = $this->salt();
        $sign = md5($appid . $text . $salt . $key);

        $query = \http_build_query([
            'q' => $text,
            'from' => 'zh',
            'to' => 'en',
            'appid' => $appid,
            'key' => $key,
            'salt' => $salt,
            'sign' => $sign,
        ]);

        $response = $http->get($api . $query);
        
        $result = json_decode($response->getBody(), true);
        
        if (!empty($result['trans_result'][0]['dst'])) {
            return $result['trans_result'][0]['dst'];
        }

        return '';
    }

    public function salt()
    {
        return time();
    }

    
}