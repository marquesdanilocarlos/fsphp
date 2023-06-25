<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.12 - Constantes e constantes mágicas");

/*
 * [ constantes ] https://php.net/manual/pt_BR/language.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);
define("COURSE", "Full Stack PHP");
const AUTHOR = "Robson";

$formation = true;

if ($formation) {
    define("COURSE_TYPE", "Formação");
    //const TESTE = "teste";
} else {
    define("COURSE_TYPE", "Curso");
}

echo "<p>", COURSE_TYPE, " ", COURSE, " ", AUTHOR;
echo "<p>" . COURSE_TYPE . " " . COURSE . " " . AUTHOR;

class Config
{
    const USER = "root";
    const HOST = "localhost";

    public function getConfigs()
    {
        return [self::HOST, self::USER];
    }
}

echo "<p>", Config::USER, " ", Config::HOST, "</p>";

var_dump(get_defined_constants(true)["user"]);

/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);

var_dump([
    __LINE__,
    __FILE__,
    __DIR__,

]);

function fsPhpFunction()
{
    return __FUNCTION__;
}

var_dump(fsPhpFunction());

trait MyTrait
{
    public $traitName = __TRAIT__;
}

class FsPHP
{
    use MyTrait;
    public $className = __CLASS__;
}

var_dump(new FsPHP());

require __DIR__."/MyClass.php";

var_dump(new \Source\MyClass());
var_dump(\Source\MyClass::class);