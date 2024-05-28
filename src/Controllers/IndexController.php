<?php

namespace Azcend\Controllers;

use Azcend\Core\Session;

class IndexController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {

        Session::set('user', ["name" => "Filip Thuresson", "email" => "filip.tthuresson@gmail.com"]);
        $this->view('index.index');
    }
}