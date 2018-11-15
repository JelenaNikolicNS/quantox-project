<?php

require_once 'Database.php';

$instance = Database::getInstance();
$db = $instance->getConnection();

require_once 'LoginValidator.php';
require_once 'RegistrationValidator.php';
require_once 'View.php';
require_once 'User.php';

$view = new View('home');
$view->view();

if(isset($_POST['submit'])) {
    $loginValidator = new RegistrationValidator();
    if ($loginValidator->validate($_POST)) {
        $user = new User($db);
        $user->insert($_POST);
    }
}

if(isset($_POST['login'])) {
    $loginValidator = new LoginValidator();
    if($loginValidator->validate($_POST)) {
        $user = new User($db);
        $logged = $user->login($_POST);

        if($logged) {
            //user logged instart session
        }

    }
}

if(isset($_POST['search'])) {
    $data = array (
      ':searchTerm' => $_POST['searchTerm']
    );

    $stmt = $db->prepare("SELECT * FROM users WHERE email LIKE '%:searchTerm%' OR password LIKE '%:searchTerm%' OR name LIKE '%:searchTerm%'");
    $stmt->execute($data);

    while($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        echo $result['name'];
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row){
        echo $row['name'].'<br/>';
    }
}