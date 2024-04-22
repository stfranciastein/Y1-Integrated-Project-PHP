<?php
class UserFormValidator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {
        if (!$this->isPresent("username")) {
            $this->errors["username"] = "Please enter a username";
        }
        else if (!$this->minLength("username", 3)) {
            $this->errors["username"] = "Enter a username with at least 3 characters";
        }
        else if (!$this->maxLength("username", 8)) {
            $this->errors["username"] = "Username must be no more than 8 characters";
        }

        if (!$this->isPresent("email")) {
            $this->errors["email"] = "Please enter a valid email";
        }
        elseif (!$this->isMatch("email", '/@/')) {
            $this->errors["email"] = "Email must contain the @ symbol.";
        }        

        if (!$this->isPresent("pass_word")) {
            $this->errors["pass_word"] = "Please enter a password";
        }
        else if (!$this->minLength("pass_word", 6)) {
            $this->errors["pass_word"] = "Password must have at least 6 characters";
        }
        else if (!$this->maxLength("pass_word", 24)) {
            $this->errors["pass_word"] = "Password must be no more than 24 characters";
        }
        else if (!$this->isMatch("pass_word", '/^(?=.*\d)(?=.*[^\w\s]).+$/')) {
            $this->errors["pass_word"] = "Password must contain at least one number and one special character";
        }
        else if ($this->data["pass_word"] !== $this->data["pass_word_confirm"]) {
            $this->errors["pass_word"] = "Passwords do not match";
            $this->errors["pass_word_confirm"] = "Passwords do not match";
        }

        return count($this->errors) === 0;
    }
}
?>