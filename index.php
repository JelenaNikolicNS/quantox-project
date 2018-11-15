<?php

require_once 'LoginValidator.php';
require_once 'RegistrationValidator.php';
require_once 'View.php';
require_once 'User.php';
require_once 'Search.php';
require_once 'Database.php';

$instance = Database::getInstance();
$db = $instance->getConnection();

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
            // user logged in start session
        }
    }
}

if(isset($_POST['search'])) {
    // check if user is logged in
    // if he is
    $searcher = new Search($db);
    $searcher->searchTerm($_POST);
    // if he is not
    // send him to login page
}