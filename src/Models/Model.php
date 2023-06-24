<?php

namespace Azcend\Models;

use Azcend\App\Database;

class Model
{
    private $db;
    public $table;

    public $data;

    public function __construct()
    {
        $this->db = new Database();
        $path = explode('\\', get_class($this));
        $this->table = array_pop($path);
    }

    public function find($id) {
        $this->data = $this->db->query(
            "SELECT * FROM {$this->table} WHERE id = {$id}"
        )->fetchAll();

        //return $this->data;
    }

}