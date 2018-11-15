<?php

class LoginValidator {
    public function validate($data) {
        $email = $this->checkEmail($data['email']);
        $password = $this->checkPassword($data['password']);

        if(!$email) {
            echo 'Provided email is incorrect.';
            return false;
        }
        if(!$password) {
            echo 'Password must have between 4 and 15 characters.';
            return false;
        }

        return true;
    }

    protected function checkEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
    }

    protected function checkPassword($password) {
        if(3 < strlen($password) && strlen($password) < 16) {
            return true;
        }
    }

}