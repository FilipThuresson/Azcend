<?php

require 'src/App/controllerTemplate.php';

switch ($argv[1])  {
    case 'create:controller': {
            $file = fopen('src/Controllers/' . $argv[2] .'Controller.php', 'w');
            $txt = create_controller($argv[2]);
            fwrite($file, $txt);
            fclose($file);
        break;
    }

    default: {
        echo 'wrong command';
    }
}