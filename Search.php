<?php

class Search {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function searchTerm($data) {
        extract($data);

        $data = array (
            ':searchTerm' => $_POST['searchTerm']
        );

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email LIKE concat('%', :searchTerm, '%') OR password LIKE concat('%', :searchTerm, '%') OR name LIKE concat('%', :searchTerm, '%')");
        $stmt->execute($data);
        $stmt->errorInfo();

        //var_dump($stmt->fetch());

        while($result = $stmt->fetch()){
            echo $result['name'] . ' -> ' . $result['email'] . ' -> ' . $result['password'];
        }
    }
}