<?php
class StoryFormValidator extends FormValidator {
    public function __construct($data=[]) {
        parent::__construct($data);
    }

    public function validate() {
        if (!$this->isPresent("headline")) {
            $this->errors["headline"] = "Please enter a valid headline";
        }
        else if (!$this->minLength("headline", 10)) {
            $this->errors["headline"] = "Enter a headline with at least 10 characters";
        }
        else if (!$this->maxLength("headline", 70)) {
            $this->errors["headline"] = "Headline must be less than 70 characters";
        }

        if (!$this->isPresent("subarticle")) {
            $this->errors["subarticle"] = "Please enter a valid subarticle";
        }
        else if (!$this->minLength("subarticle", 20)) {
            $this->errors["subarticle"] = "Enter a subarticle with at least 20 characters";
        }
        else if (!$this->maxLength("subarticle", 255)) {
            $this->errors["subarticle"] = "Title must be less than 30 characters";
        }

        if (!$this->isPresent("article")) {
            $this->errors["article"] = "Please enter a valid article";
        }
        else if (!$this->minLength("article", 300)) {
            $this->errors["article"] = "Enter a article with at least 300 characters";
        }
        // else if (!$this->maxLength("article", 30)) {
        //     $this->errors["article"] = "Title must be less than 30 characters";
        // }

        if (!$this->isPresent("img_url")) {
            $this->errors["img_url"] = "Please enter a valid image url";
        }
        else if (!$this->minLength("img_url", 12)) {
            $this->errors["img_url"] = "Enter a image url with at least 12 characters";
        }   

        $validAuthors = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16"];
        if (!$this->isPresent("author_id")) {
            $this->errors["author_id"] = "Please choose an author";
        }
        else if (!$this->isElement("author_id", $validAuthors)) {
            $this->errors["author_id"] = "Please choose a valid author";
        }

        $validCategories = ["0", "1", "2", "3", "4", "5", "6"];
        if (!$this->isPresent("category_id")) {
            $this->errors["category_id"] = "Please choose a category";
        }
        else if (!$this->isElement("category_id", $validCategories)) {
            $this->errors["category_id"] = "Please choose a valid category";
        }
        
        $validLocations = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11"];
        if (!$this->isPresent("location_id")) {
            $this->errors["location_id"] = "Please choose a location";
        }
        else if (!$this->isElement("location_id", $validLocations)) {
            $this->errors["location_id"] = "Please choose a valid location";
        }

        return count($this->errors) === 0;
    }
}
?>