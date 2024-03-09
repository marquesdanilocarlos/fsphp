<?php

namespace Source\App\Controller;

use CoffeeCode\Paginator\Paginator;
use Source\Core\Connection;
use Source\Core\Controller;
use Source\Core\View;
use Source\Model\User;

class UserController extends Controller
{
    public function __construct(
        private View $view = new View()
    )
    {
        $this->view->addPath('test', __DIR__ . "/../../../assets/views/test");
    }

    public function home()
    {
        $getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        $totalUsers = Connection::getInstance()->query("SELECT COUNT(id) as total FROM users")->fetch()->total;
        $pager = new Paginator('?page=');
        $pager->pager($totalUsers, 3, $getPage, 2);

        echo $this->view->render('test::list', [
            'title' => 'Usuários do sistema',
            'list' => (new User())->findAll($pager->limit(), $pager->offset()),
            'pager' => $pager->render()
        ]);
    }

    public function edit()
    {

    }
}