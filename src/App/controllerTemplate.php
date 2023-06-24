<?php

function create_controller($className) {
    $txt = '<?php

namespace Azcend\Controllers;

class '.$className.'Controller extends BaseController
{
    public function index(): void
    {
        $this->view(\''. strtolower($className) . '.' . strtolower($className) .'\');
    }
}
    ';

    return $txt;
}