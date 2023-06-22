<?php


namespace Azcend\Controllers;

abstract class BaseController{

    public array $variables;
    public function view($view_file) {

        extract($this->variables, EXTR_PREFIX_SAME, "wddx");


        if(file_exists(__DIR__ . '/../Views/' .$view_file.'.php')) {
            include(__DIR__ . '/../Views/' .$view_file.'.php');
        } else {
            include(__DIR__ . '/../Views/errors/404.html');
        }
    }

}