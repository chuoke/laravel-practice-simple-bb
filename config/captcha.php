<?php

return [

    'characters' => '2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ',

    'default'   => [
        'length'    => 5,
        'width'     => 100,
        'height'    => 36,
        'quality'   => 80,
        'math'      => true,
    ],

    'flat'   => [
        'length'    => 5,
        'width'     => 100,
        'height'    => 35,
        'quality'   => 50,
        'lines'     => 6,
        'bgImage'   => false,
        'bgColor'   => '#f8fafc',
        'fontColors'=> ['#232b43', '#c0392b', '#aac5d6', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast'  => -5,
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ]

];
