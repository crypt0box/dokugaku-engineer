<?php

$userAges = [
    'Tanaka' => 20,
    'Kimura' => 25,
    'Tabata' => 40,
];
$userOver30 = array_filter($userAges, function ($v) {
    return $v >= 30;
});

print_r($userOver30);