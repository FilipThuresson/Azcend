<?php

namespace Azcend\Controllers;

use GuzzleHttp\Client;
class IndexController extends BaseController
{
    public function index() {

        $this->variables = [
            "title" => "Home page",
            "name" => "Filip Thuresson",
        ];

        $this->view('index', 'index');
    }

}