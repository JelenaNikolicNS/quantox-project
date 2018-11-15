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

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email LIKE '%:searchTerm%' OR password LIKE '%:searchTerm%' OR name LIKE '%:searchTerm%'");
        $stmt->execute($data);

        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo $result['name'];
        }
    }
}