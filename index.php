<?php

require_once 'LoginValidator.php';
require_once 'RegistrationValidator.php';
require_once 'View.php';
require_once 'User.php';
require_once 'Search.php';
require_once 'Database.php';

session_start();

$instance = Database::getInstance();
$db = $instance->getConnection();

$view = new View('home');
$view->view();

if(isset($_POST['submit'])) {
    $loginValidator = new RegistrationValidator();
    if ($loginValidator->validate($_POST)) {
        $user = new User($db);
        $user->insert($_POST);
        //start a session
        $_SESSION['logged'] = true;
    }
}

if(isset($_POST['login'])) {
    $loginValidator = new LoginValidator();
    if($loginValidator->validate($_POST)) {
        $user = new User($db);
        $logged = $user->login($_POST);

        if($logged) {
            $_SESSION['logged'] = true;
            echo 'jupi';
        }
    }
}

if(isset($_POST['search'])) {
    if($_SESSION && $_SESSION['logged']) {
        $searcher = new Search($db);
        $searcher->searchTerm($_POST);
    } else {
        echo 'you must be logged in to search';
    }
}