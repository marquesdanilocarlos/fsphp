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
} else {
    //const COURSE_TYPE = "Curso";
    define("COURSE_TYPE", "Curso");
}

echo "<p>" . COURSE_TYPE . " " . COURSE . " de " . AUTHOR . "</p>";


class ConstantsOnClass
{
    const USER = "root";
    const HOST = "localhost";
}

echo "<p>", ConstantsOnClass::USER, "</p>";
echo "<p>", ConstantsOnClass::HOST, "</p>";

var_dump(get_defined_constants(true)["user"]);
/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);

var_dump([
    __LINE__,
    __FILE__,
    __DIR__
         ]);


function fullStackPHP(){
    var_dump(__FUNCTION__);
}

fullStackPHP();

trait MyTrait
{
    public $traitName = __TRAIT__;
}

class MyClass
{
    use MyTrait;
    public $className = __CLASS__;
}


var_dump(new MyClass());

require __DIR__ . "/MyNewClass.php";

var_dump(new \Source\MyNewClass(), \Source\MyNewClass::class);


