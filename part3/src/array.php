<?php

$members = [
    [
        'name' => 'yamaura',
        'team' => [
            'sales',
            'marketing',
        ],
    ],
];

var_dump($members[0]['team'][1]);

$another_members = [
    'taguchi',
    'age' => 25,
    'salese',
]; // 一部だけキーを付けたりできるが非推奨

var_dump($another_members);