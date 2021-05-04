<?php


function functionName($arg1, $arg2, $arg3)
{
    var_dump([$arg1, $arg2, $arg3]);
}


function optionalArgs($arg1, $arg2 = true, $arg3 = null)
{
    return [$arg1, $arg2, $arg3];
}

function calcImc()
{
    global $weight;
    global $height;

    return $weight / ($height ** 2);
}

function totalPay($price)
{
    static $total;
    $total += $price;
    return "<p>O total é {$total}</p>";
}

function myTeam()
{
    $teamNames = func_get_args();
    $teamCount = func_num_args();

    return ["members" => $teamNames, "count" => $teamCount];
}
