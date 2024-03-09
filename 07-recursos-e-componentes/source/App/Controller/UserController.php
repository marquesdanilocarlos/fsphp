<?php

namespace Source\App\Controller;

use Source\Core\Controller;
use Source\Core\View;

class UserController extends Controller
{
    public function __construct(
        private View $view = new View()
    )
    {
        $this->view->addPath('test', __DIR__ . "/../../../assets/views/test");
    }
}