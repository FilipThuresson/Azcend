<?php

require 'vendor/autoload.php';
$_ENV = parse_ini_file('.env');
chdir(__DIR__);

$cmd = explode(':', $argv[1]);


switch ($cmd[0]) {
    case 'create':
        switch ($cmd[1]) {
            case 'controller':
                $file = fopen('src/Controllers/' . ucfirst($argv[2]) . 'Controller.php', 'w');
                $txt = Azcend\Core\GenerateFile::create_controller(ucfirst($argv[2]));
                fwrite($file, $txt);
                fclose($file);
                break;
            case 'migration':
                if ($argc != 3) {
                    echo "Error> Please use the following format:\n\tphp app.php create:migration <migration_name>";
                    break;
                }

                $name = \Azcend\Database\Migration::new($argv[2]);

                if($name) {
                    echo "INFO> Created Migration: " . $name . "\n";
                }
        }
        break;
    case 'migrate':
        \Azcend\Database\Migration::migrate();
        break;
    default:
    {
        echo 'wrong command';
    }
}

