<?php

class Validation
{
    //INPUT properties

    private $text = "";
    private $compare = "";
    public $output = "";
    private $error = false;

    //SETTER methods

    public function setText($input){
        $this->text = $input;
    }

    public function setCompare($input){
        $this->compare = $input;
    }

    public function setError(){
        $this->error = true;
    }

    //GETTER methods

    public function getText(){
        return $this->text;
    }

    public function getCompare(){
        return $this->compare;
    }

    public function getError(){
        return $this->error;
    }

    //VALIDATION methods

    //EMPTY check

    public function validate_empty(){
        if(empty($this->text)){
            $this->output = "please enter details";
            $this->setError();
            return $this->output;
        }
    }

    //STRING LENGTH > 20 check

    public function validate_lengthmax20(){
        if(strlen($this->text) > 20 && !empty($this->text)){
            $this->output = "must be less than 20 characters";
            $this->setError();
        }
    }

    //STRING LENGTH < 5

    public function validate_lengthmin5(){
        if(strlen($this->text) < 5 && !empty($this->text)){
            $this->output = "must be more than 5 characters";
            $this->setError();
            return $this->output;
        }
    }

    //COMPARE two values

    public function validate_comparepassword(){
        if(empty($this->compare) && !empty($this->text)){
            $this->output = "please enter value above";
            $this->setError();
            return $this->output;
        }elseif($this->compare != $this->text){
            $this->output = "does not match";
            $this->setError();
            return $this->output;
        }
    }

    //REGEX name (letters and hyphens)

    public function validate_regexname() {
        if (!preg_match("/^[a-zA-Z-]*$/", $this->text) && !empty($this->text)){
            $this->output = "only letters and hyphens allowed";
            $this->setError();
            return $this->output;
        }
    }

    //REGEX username (alphanumeric characters and underscore)

    public function validate_regexusername(){
        if (!preg_match("/^[[:alnum:]_]+$/", $this->text) && !empty($this->text)){
            $this->output = "only letters, numbers and underscores allowed";
            $this->setError();
            return $this->output;
        }
    }

    //REGEX password (visible characters except spaces and control chars)

    public function validate_regexpassword(){
        if(!preg_match("/^[[:graph:]]+$/", $this->text) && !empty($this->text)){
            $this->output = "no spaces or control characters allowed";
            $this->setError();
            return $this->output;
        }
    }

    //REGEX email

    public function validate_regexemail(){
        if (!filter_var($this->text, FILTER_VALIDATE_EMAIL) && !empty($this->text)){
            $this->output = "invalid email";
            $this->setError();
            return $this->output;
        }
    }

    //DROPDOWNS

    public function validate_defaultdropdown(){
        if ($this->text == 'default'){
            $this->output = "please select";
            $this->setError();
            return $this->output;
        }
    }

    public function validate_zerodropdown(){
        if ($this->text == 0){
            $this->output = "please select";
            $this->setError();
            return $this->output;
        }
    }

}

?>

