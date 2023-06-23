<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.10 - Requisição de arquivos");

/*
 * [ include ] https://php.net/manual/pt_BR/function.include.php
 * [ include_once ] https://php.net/manual/pt_BR/function.include-once.php
 */
fullStackPHPClassSession("include, include_once", __LINE__);
/*include "file.php";
echo "Mas o código continua...";*/
include __DIR__."/header.php";

$profile = new stdClass();
$profile->name = "Danilo";
$profile->company = "SECOM";
$profile->email = "danilo.marques@presidencia.gov.br";

include __DIR__."/profile.php";

$profile = new stdClass();
$profile->name = "Felipe";
$profile->company = "SECOM";
$profile->email = "felipe.jesus@presidencia.gov.br";
include __DIR__."/profile.php";


/*
 * [ require ] https://php.net/manual/pt_BR/function.require.php
 * [ require_once ] https://php.net/manual/pt_BR/function.require-once.php
 */
fullStackPHPClassSession("require, require_once", __LINE__);
/*require "file.php";
echo "Continuando...";*/

require __DIR__."/config.php";
echo COURSE;
require_once __DIR__."/config.php";

var_dump(require_once __DIR__."/config.php");

