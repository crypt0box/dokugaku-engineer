<?php

echo gettype(1) . PHP_EOL;
echo gettype(0) . PHP_EOL;
echo gettype(-1) . PHP_EOL;

var_dump(0b10);
var_dump(010);
var_dump(0x10);

var_dump(PHP_INT_MAX + 1);

var_dump((PHP_INT_MAX + 1) === (PHP_INT_MAX + 2)); // true