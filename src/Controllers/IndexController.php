<?php

namespace Azcend\Controllers;

use Azcend\Models\User;
class IndexController extends BaseController
{
    public function index() {

        $user = new User();
        $user->find(1);

        $this->variables = [
            "title" => "Home page",
            "name" => "Filip Thuresson",
            "tablename" => $user->data,
        ];

        $this->view('index.index');

        //$this->view('info', '');
    }

}