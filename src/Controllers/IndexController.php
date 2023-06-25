<?php

namespace Azcend\Controllers;

class IndexController extends BaseController
{
    public function index(): void
    {
        $this->view('index.index');
    }
}