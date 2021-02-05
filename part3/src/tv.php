<?php

const SPILIT_LENGTH = 2;

function getInput()
{
    $argument = array_slice($_SERVER['argv'], 1);
    return array_chunk($argument, SPILIT_LENGTH);
}

function groupChannelViewingPeriods(array $inputs): array
{
    $channelViewingPeriods = [];
    foreach ($inputs as $input) {
        $ch = $input[0];
        $min = $input[1];
        $mins = [$min];

        if (array_key_exists($ch, $channelViewingPeriods)) {
            $mins = array_merge($channelViewingPeriods[$ch], $mins);
        }

        $channelViewingPeriods[$ch] = $mins;
    }
    return $channelViewingPeriods;
}

function calculateTotalHour(array $channelViewingPeriods): float
{
    $viewingTimes = [];
    foreach ($channelViewingPeriods as $period) {
        $viewingTimes = array_merge($viewingTimes, $period);
    }
    $totalMin = array_sum($viewingTimes);
    return round($totalMin / 60, 1);
}

function display(array $channelViewingPeriods): void
{
    $totalHour = calculateTotalHour($channelViewingPeriods);
    echo $totalHour . PHP_EOL;
    foreach ($channelViewingPeriods as $ch => $mins) {
        echo $ch . ' ' . array_sum($mins) . ' ' . count($mins) . PHP_EOL;
    }
}

$inputs = getInput();
$channelViewingPeriods = groupChannelViewingPeriods($inputs);
display($channelViewingPeriods);


// 1 30 5 25 2 30 1 15