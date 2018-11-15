<?php

class User {

    private $db;

    public $name;
    public $password;
    public $email;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert($data) {
        extract($data);

        $data = array (
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
        );
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $stmt->execute($data);
        var_dump($this->db->lastInsertId());
    }

    public function login($data) {
        extract($data);

        $data = array (
            ':email' => $email,
            ':password' => $password,
        );
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $stmt->execute($data);
        var_dump( $user = $stmt->fetch());
    }

}