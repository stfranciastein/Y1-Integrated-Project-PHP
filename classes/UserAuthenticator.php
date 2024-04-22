<?php
require_once 'db.php';
require_once 'user.php';


class UserAuthenticator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function authenticate() {
        if (!$this->isPresent("username") || !$this->isPresent("password")) {
            $this->errors["username"] = "Please enter both username and password";
        }

        $username = $this->data['username'];
        $password = $this->data['password'];

        $user = User::findByUsername($username);

        if (!$user) {
            $this->errors["username"] = "Invalid username";
        }

        if ($user->pass_word !== $password) {
            $this->errors["password"] = "Incorrect password";
        }

        if (count($this->errors) === 0) {
            $_SESSION["user_id"] = $user->id;
            $_SESSION["user_name"] = $user->username;
            $_SESSION["site_admin"] = $user->site_admin;
        }
        
        return count($this->errors) === 0;
    }
}
?>