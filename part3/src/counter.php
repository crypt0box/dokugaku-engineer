<?php

$count = 0;

function test($count)
{
    $count++;
    echo $count;
    if ($count < 10) {
        test($count);
    }
}

test($count);