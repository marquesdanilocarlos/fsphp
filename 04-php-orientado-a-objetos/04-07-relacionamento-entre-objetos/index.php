<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);
$company = new \Source\Related\Company();

$address = new \Source\Related\Address("QA 13 MR Casa", 8, "Setor Sul");
$company->boot("Danilera S.A.", $address);

var_dump($company);

echo "<p>A {$company->getName()} tem sede em {$company->getAddress()->getStreet()} {$company->getAddress()->getNumber()} {$company->getAddress()->getComplement()}</p>";


/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);
$fsphp = new \Source\Related\Product("Full Stack PHP", 1997);
$laradev = new \Source\Related\Product("Laravel Developer", 997);

$company->addProduct($fsphp);
$company->addProduct($laradev);

/**
 * @var $product \Source\Related\Product;
 */
foreach ($company->getProducts() as $product) {
    echo "<p>{$product->getName()} pelo valor de {$product->getPrice()}</p>";
}


/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);
$company->addTeamMember("CEO", "Danilo", "Marques");
$company->addTeamMember("CTO", "Danilera", "Carlos");
$company->addTeamMember("CFO", "Daniluxo", "Pinto");

/**
 * @var $member \Source\Related\User
 */
foreach ($company->getTeam() as $member) {
    echo "<p>{$member->getJob()}: {$member->getFirstName()} {$member->getLastName()}</p>";
}









