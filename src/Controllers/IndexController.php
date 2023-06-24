<?php

namespace Azcend\Controllers;

use Azcend\Models\User;

class IndexController extends BaseController
{
    public function index(): void
    {
        $userModel = new User();
        $users = $userModel->find(1);
        $this->set('users', $users);

        $this->view('index.index');
    }

}