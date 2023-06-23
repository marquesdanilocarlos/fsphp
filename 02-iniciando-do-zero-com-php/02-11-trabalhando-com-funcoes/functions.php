<?php

/**
 * @param string $arg1
 * @param bool $arg2
 * @param mixed $arg3
 * @return array
 */
function rockBands(string $arg1, bool $arg2 = true, mixed $arg3 = null): array
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

/**
 * @return float
 */
function imc(): float
{
    global $height;
    global $weight;

    return $weight / pow($height, 2);
}

function totalPay(float $price): string
{
    static $total;
    $total += $price;
    return "<p>O total a pagar é R$ " . number_format($total, 2, ",", ".") . " </p>";
}

function myTeam()
{
    $teamNames = func_get_args();
    $teamCount = func_num_args();
    return ['arguments' => $teamNames, 'count' => $teamCount];
}