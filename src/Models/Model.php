<?php

namespace Azcend\Models;

use Azcend\App\Database;

class Model
{
    private $db;
    public $indexies;
    public $table;

    public $data;



    public function __construct()
    {
        $this->db = new Database();
        $path = explode('\\', get_class($this));
        $this->table = array_pop($path) . 's';

        $this->indexies = $this->db->query("DESCRIBE {$this->table}")->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function find($id) {
        $this->data = $this->db->query(
            "SELECT * FROM {$this->table} WHERE id = {$id}"
        )->fetch();
        return $this->data;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    public function get($key) {
        $this->data[$key];
    }

    public function save() {
        $indexies = implode(', ', $this->indexies);
        $values = implode('\', \'', $this->data);
        $this->db->query("INSERT INTO {$this->table} ({$indexies}) VALUES (null, '{$values}')");
    }
}