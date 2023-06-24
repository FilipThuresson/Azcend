<?php

namespace Azcend\App;


use PDO;

class Database
{
    private $host = 'mysql';
    private $username = 'root';
    private $password = 'secret';
    private $db_name = 'dockertest';
    private $conn;

    public function __construct() {
        /*
        $this->host = getenv('MYSQL_HOST');
        $this->username = getenv('MYSQL_USER');
        $this->password = getenv('MYSQL_PASSWORD');
        $this->db_name = getenv('MYSQL_DATABASE');

        */
        $this->conn = new PDO("mysql:host=". $this->host .";dbname=". $this->db_name, $this->username, $this->password);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn = null;
    }
}