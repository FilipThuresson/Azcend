<?php

namespace Azcend\Controllers;

use Azcend\App\Migration;

class IndexController extends BaseController
{
    public function index(): void
    {
        $this->view('index.index');
    }
}