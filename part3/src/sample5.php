<?php

$str1 = 'abcde';
$str2 = 'あいうえお';
echo strlen($str1) . PHP_EOL; // 5
echo strlen($str2) . PHP_EOL; // 15
echo mb_strlen($str2) . PHP_EOL; // 5

var_dump('1' === '１'); // false
var_dump(mb_convert_kana('1', 'Kas') === mb_convert_kana('１', 'Kas')); // true