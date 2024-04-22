<?php
class FormValidator {
    protected $data; 
    protected $errors; 

    public function __construct($data=[]) {
        $this->data = $data; //holds data to be validated
        $this->errors = []; //holds errors in an array
    }
    //===============================================================================================
    // public methods
    //===============================================================================================
    public function validate() {
        return count($this->errors) === 0;
    }

    public function authenticate() {
        return count($this->errors) === 0;
    }
    
    public function errors() {
        return $this->errors;
    }
    //===============================================================================================
    // protected validation methods
    //===============================================================================================
    protected function isPresent($key) {
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $value = $this->data[$key];
            if (is_array($value)) {
                $result = TRUE;
            }
            else {
                $trimmed_value = trim($value);
                $result = $trimmed_value !== ""; //Is the field empty
            }
        }
        return $result;
    }
    protected function minLength($key, $minLen) { //Checks against a minimum length
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $value = $this->data[$key];
            if (is_array($value)) {
                $result = count($value) >= $minLen;
            }
            else {
                $result = strlen($value) >= $minLen;
            }
        }
        return $result;
    }
    protected function maxLength($key, $maxLen) { //Checks against a maximum length
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $value = $this->data[$key];
            if (is_array($value)) {
                $result = count($value) <= $maxLen;
            }
            else {
                $result = strlen($value) <= $maxLen;
            }
        }
        return $result;
    }
    protected function isEmail($key) { //checks if it's a valid email
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $email = $this->data[$key];
            $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $result =  
                strcmp($email, $sanitized_email) === 0 &&
                filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE;
        }
        return $result;
    }
    protected function isFloat($key) { //Is it a floating number
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $float = $this->data[$key];
            $result = is_numeric($float);
        }
        return $result;
    }
    protected function isInteger($key) { //Is it an interger
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $integer = $this->data[$key];
            $result = filter_var($integer, FILTER_VALIDATE_INT) !== false;
        }
        return $result;
    }
    protected function min($key, $min) { //Is the number equal to or greater than the minimum value?
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $number = $this->data[$key];
            $result = is_numeric($number) && floatval($number) >= $min;
        }
        return $result;
    }
    protected function max($key, $max) { //Is the number equal to or greater than the maximum value?
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $number = $this->data[$key];
            $result = is_numeric($number) && floatval($number) <= $max;
        }
        return $result;
    }
    protected function isBoolean($key) { //Is it a boolean?
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $boolean = $this->data[$key];
            $result = 
                filter_var($boolean, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== NULL;
        }
        return $result;
    }
    protected function isMatch($key, $regex) { //Does it match the regex?
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $value = $this->data[$key];
            $result = preg_match($regex, $value) === 1;
        }
        return $result;
    }
    protected function isElement($key, $set) { 
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $value = $this->data[$key];
            $result = in_array($value, $set);
        }
        return $result;
    }
    protected function isSubset($key, $set) {
        $result = FALSE;
        if (array_key_exists($key, $this->data)) {
            $values = $this->data[$key];
            if (!is_array($values)) {
                $result = FALSE;
            }
            else {
                $result = count(array_diff($values, $set)) === 0;
            }
        }
        return $result;
    }
    protected function hasFile($key) {
        return 
            isset($_FILES) && 
            is_array($_FILES) && 
            array_key_exists($key, $_FILES) && 
            $_FILES[$key]['error'] !== UPLOAD_ERR_NO_FILE;
    }
}
?>