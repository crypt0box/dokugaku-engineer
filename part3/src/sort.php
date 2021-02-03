<?php

$ages = [
    'Nakata' => 34,
    'Abe' => 25,
    'Kato' => 32,
    'Watanabe' => 29,
    'Fukuzawa' => 42,
];

ksort($ages);
var_dump($ages);

arsort($ages);
var_dump($ages);