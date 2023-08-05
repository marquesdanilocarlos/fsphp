<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.06 - Interpretação e operações pt2");

require __DIR__ . "/source/autoload.php";

/*
 * [ set ] Executado altomaticamente quando se tenta criar uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.set
 *
 * inacessível = propridade é privada ou não existe
 */
fullStackPHPClassSession("__set", __LINE__);
$fsphp = new Source\Interpretation\Product();
$fsphp->handler("Full Stack PHP Developer", 1997);

$fsphp->name = "FSPHP";
$fsphp->title = "FSPHP";
$fsphp->company = "UpInside";
$fsphp->price = 1999;

var_dump($fsphp);

/*
 * [ get ] Executado automaticamente quando se tenta obter uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.get
 *
 */
fullStackPHPClassSession("__get", __LINE__);
echo "<p>O curso {$fsphp->title} da {$fsphp->company} é o melhor curso de PHP do mercado.</p>";

/*
 * [ isset ] Executada automaticamente quando um teste ISSET ou EMPTY é executado em uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.isset
 */
fullStackPHPClassSession("__isset", __LINE__);
isset($fsphp->phone);
isset($fsphp->name);
empty($fsphp->address);

/*
 * [ call ] Executada automaticamente quando se tenta usar um método inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.call
 *
 */
fullStackPHPClassSession("__call", __LINE__);
$fsphp->notFound("Ooops", "teste");
$fsphp->setPrice(1997, 10);

/*
 * [ unset ] Executada automaticamente quando se tenta usar unset em uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.unset
 */
fullStackPHPClassSession("__toString", __LINE__);
echo $fsphp;

/*
 * [ unset ] Executada automaticamente quando se tenta usar unset em uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.unset
 */
fullStackPHPClassSession("__unset", __LINE__);
unset(
  $fsphp->name,
  $fsphp->price,
  $fsphp->data
);

/*
 * [ invoke ] Executada automaticamente quando se tenta utilizar uma classe como se fosse uma função
 * https://php.net/manual/pt_BR/language.oop5.magic.php#object.invoke
 */
fullStackPHPClassSession("__invoke", __LINE__);
$invokeResult = $fsphp('argument');
echo $invokeResult;