<?php

// $a = 'php';
// $b = $a;
// $a[0] = 'z';

// echo $a . PHP_EOL;
// echo $b . PHP_EOL;


$c = 'php';
$d = &$c;
$c[0] = 'z';

echo $c . PHP_EOL;
echo $d . PHP_EOL;