<?php

$num = 0;

while (true) {
  if ($num < 5) {
    echo ++$num * 10 . PHP_EOL;
  } else {
  break;
  }
}