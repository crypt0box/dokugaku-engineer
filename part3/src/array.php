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

$movie = [
    'name' => 'totoro',
];
$movie['year'] = 1988;

$movie2 = [
    'director' => 'Miyazaki Hayao',
];
$movie3 = array_merge($movie, $movie2);

var_dump($movie3);
var_dump(count($movie3));

$weights = [
    'Kumagae' => 50,
    'Suemitsu' => 90,
    'Kawasaki' => 45,
];
asort($weights);
var_dump($weights);