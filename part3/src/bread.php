<?php

const SPILIT_LENGTH = 2;
const TAX = 0.1;
const BREAD_VALUE_LIST = [
    1 => 100,
    2 => 120,
    3 => 150,
    4 => 250,
    5 => 80,
    6 => 120,
    7 => 100,
    8 => 180,
    9 => 50,
    10 =>300
];

function getInput()
{
    $argument = array_slice($_SERVER['argv'], 1);
    return array_chunk($argument, SPILIT_LENGTH);
}

function groupSoldBreads(array $inputs): array {
    $soldBreads = [];
    foreach ($inputs as $input) {
        $soldBreadNumber = $input[0];
        $quantity = (int)$input[1];

        if (array_key_exists($soldBreadNumber, $soldBreads)) {
            $soldBreads[$soldBreadNumber] += $quantity;
        } else {
            $soldBreads[$soldBreadNumber] = $quantity;
        }
    }
    return $soldBreads;
};

function calculateTotalCost(array $soldBreads): int {
    $totalCost = 0;
    foreach ($soldBreads as $soldBreadNumber => $quantity) {
        $totalCost += BREAD_VALUE_LIST[$soldBreadNumber] * $quantity;
    }
    $totalCost += $totalCost * TAX;
    return $totalCost;
}

function display(array $soldBreads): void {
    echo calculateTotalCost($soldBreads) . PHP_EOL;
    echo array_search(max($soldBreads), $soldBreads) . PHP_EOL;
    echo array_search(min($soldBreads), $soldBreads) . PHP_EOL;
}

$inputs = getInput();
$soldBreads = groupSoldBreads($inputs);
display($soldBreads);
