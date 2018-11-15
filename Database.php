<?php

class Database extends PDO {
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'quantox';

    public function __construct() {
        $this->connection = new \PDO("mysql:host={$this->host}; dbname={$this->db}", $this->user, $this->pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}