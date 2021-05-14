<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require __DIR__ . "/classes/App/Template.php";
require __DIR__ . "/classes/Web/Template.php";

use App\Template;
use Web\Template as WebTemplate;

$appTemplate = new Template();
$webTemplate = new WebTemplate();

var_dump($appTemplate, $webTemplate);


/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);

require __DIR__ . "/source/Qualified/User.php";

$user =  new \Source\Qualified\User();

//$user->firstName = "Danilo";
//$user->lastName = "Marques";
//$user->setFirstName("Danilo");
//$user->setLastName("Marques");

//echo "<p>O email de {$user->getFirstName()} é {$user->getEmail()}</p>";

var_dump($user, get_class_methods($user));



/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);

$danilo = $user->setUser("Danilo", "Leite", "cursos@upinside.com.br");

if (!$danilo) {
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

var_dump($user);
