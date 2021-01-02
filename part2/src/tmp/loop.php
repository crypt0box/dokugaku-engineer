<?php

// $numbers = [1, 2, 3, 4, 5];
// foreach ($numbers as $number) {
//     echo $number * 2 . PHP_EOL;
// }

$currencies = [
    'japan' => 'yen',
    'us' => 'dollar',
    'england' => 'pond',
];
foreach ($currencies as $country => $currency) {
    echo $country . ': ' . $currency . PHP_EOL;
}