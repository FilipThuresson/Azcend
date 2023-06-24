<?php


namespace Azcend\Controllers;

abstract class BaseController{

    public array $variables = [];
    public function view($view_file) {

        extract($this->variables, EXTR_PREFIX_SAME, "");

        $paths = explode('.', $view_file);
        $file_path = '';

        foreach ($paths as $idx=>$path) {
            if ($idx === count($paths) -1) {
                $file_path .= $path . '.php';
            }
            else {
                $file_path .= $path . '/';
            }
        }

        if(file_exists(__DIR__ . '/../Views/' . $file_path)) {
            include(__DIR__ . '/../Views/' . $file_path);
        } else {
            include(__DIR__ . '/../Views/errors/404.html');
        }
    }


    public function set($key, $value) {
        $this->variables[$key] = $value;
    }

    public function get($key) {
        return $this->variables[$key];
    }
}