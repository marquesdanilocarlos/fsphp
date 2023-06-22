<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.07 - Estruturas de controle");

/*
 * [ if ] https://php.net/manual/pt_BR/control-structures.if.php
 * [ elseif ] https://php.net/manual/pt_BR/control-structures.elseif.php
 * [ else ] https://php.net/manual/pt_BR/control-structures.else.php
 */
fullStackPHPClassSession("if, elseif, else", __LINE__);
$test = false;

if ($test) {
    echo "<p>Condição satisfeita</p>";
} else {
    echo "<p>Condição não satisfeita</p>";
}

echo "<hr/>";

$age = 32;

if ($age < 20) {
    echo "<p>Bandas coloridas</p>";
} elseif ($age > 20 && $age < 50) {
    echo "<p>Ótimas bandas</p>";
} else {
    echo "<p>Rock and Roll raíz</p>";
}

$hour = 3;

if ($hour >= 5 && $hour < 23) {
    if ($hour < 7) {
        echo "<p>Bob Marley</p>";
    } else {
        echo "<p>After Bridge</p>";
    }
} else {
    echo "<p>zzZZzzZZZzzZZ</p>";
}

/*
 * [ isset ] https://php.net/manual/pt_BR/function.isset.php
 * [ empty] https://php.net/manual/pt_BR/function.empty.php
 */
fullStackPHPClassSession("isset, empty, !", __LINE__);
$rock = "";

if (!isset($rock)) {
    var_dump("Rock and Roll");
} else {
    var_dump("Die");
}

$rockAndRoll = "AC/DC";

if (!empty($rockAndRoll)) {
    var_dump("Rock existe e toca {$rockAndRoll}");
} else {
    var_dump("Rock não existe ou não está tocando...");
}

/*
 * [ switch ] https://secure.php.net/manual/pt_BR/control-structures.switch.php
 */
fullStackPHPClassSession("switch", __LINE__);

$payment = "completed";

switch ($payment) {
    case "billet_printed":
        var_dump("Boleto impresso!");
        break;
    case "canceled":
        var_dump("Pagamento Cancelado!");
        break;
    case "past_due":
    case "pending":
        var_dump("Aguardando pagamento!");
        break;
    case "approved":
    case "completed":
        var_dump("Pagamento aprovado!");
        break;
    default:
        var_dump("Erro ao processar pagamento!");
}


