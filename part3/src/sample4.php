<?php

var_dump(1.1);
var_dump(1.1e2);
var_dump(0.1 + 0.2);
var_dump((0.1 + 0.2) === 0.3); // false

$number = bcadd('0.1', '0.2', 1);
var_dump((float) $number === 0.3); // true