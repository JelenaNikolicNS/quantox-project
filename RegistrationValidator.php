<?php

class RegistrationValidator extends LoginValidator {
    public function validate($data) {
        $email = parent::checkEmail($data['email']);
        $password = parent::checkPassword($data['password']);
        $password_again = $this->checkIfRepeatedPasswordMatches($data['password'], $data['password_repeat']);
        $name = $this->checkName($data['name']);

        if(!$email) {
            echo 'Provided email is incorrect.';
            return false;
        }
        if(!$password) {
            echo 'Password must have between 4 and 15 characters.';
            return false;
        }
        if($password_again !== 0 ) {
            echo 'Passwords do not match.';
            return false;
        }
        if(!$name) {
            echo 'Name must have between 2 and 30 characters.';
            return false;
        }

        return true;
    }

    private function checkIfRepeatedPasswordMatches($password, $password_repeat) {
        return strcmp($password,$password_repeat);
    }

    private function checkName($name) {
        if(1 < strlen($name) && strlen($name) < 30) {
            return true;
        } else {
            return false;
        }
    }
}