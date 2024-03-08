<?php

use Source\Model\User;
use Source\Support\Pager;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.10 - Paginador de resultados");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ paginator ] https://packagist.org/packages/coffeecode/paginator
 */
fullStackPHPClassSession("paginator", __LINE__);

$total = db()->query("SELECT COUNT(id) AS total FROM users")->fetch()->total;
$getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);

$pager = new Pager("?page=");
$pager->pager($total, 5, $getPage, 2);

$users = (new User())->findAll($pager->limit(), $pager->offset());

foreach ($users as $user) {
    echo <<<user
<article>
<h1>{$user->first_name} {$user->last_name}</h1>
<p>{$user->email} - {$user->created_at}</p>
</article>
user;
}

echo $pager->render();
