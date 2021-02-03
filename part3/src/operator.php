<?php

$number = 1;
echo $number++ . PHP_EOL; // 1
echo $number . PHP_EOL; // 2 

$number = 1;
echo ++$number . PHP_EOL; // 2
echo $number . PHP_EOL; // 2 

$number = 1;
var_dump($number == 1); // true
var_dump($number === 1); // true
var_dump($number == '1'); // true
var_dump($number === '1'); // false