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

$company->boot("Upinside", new \Source\Related\Address("QA 13 MR Casa", "08", "Setor Sul"));

var_dump($company);

echo "<p>A {$company->getCompany()} tem sede em {$company->getAddress()->getStreet()} {$company->getAddress()->getNumber()} {$company->getAddress()->getComplement()}</p>";


/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$fsPhp = new \Source\Related\Product("Full Stack PHP", 1997);
$laraDev = new \Source\Related\Product("Laravel Developer", 997);


$company->addProduct($fsPhp);
$company->addProduct($laraDev);

var_dump($company);

/**
 * @var \Source\Related\Product $product
 */
foreach ($company->getProducts() as $product) {
    echo "<p>{$product->getName()} por {$product->getPrice()}</p>";
}

/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);

$company->addTeamMember("CEO", "Robson", "Leite");
$company->addTeamMember("Manager", "Kaue", "Cardoso");
$company->addTeamMember("Support", "Gah", "Morandi");

var_dump($company);

/**
 * @var \Source\Related\User $member
 */
foreach ($company->getTeam() as $member) {
    echo "<p>{$member->getFirstName()} {$member->getLastName()}: {$member->getJob()}</p>";
}







