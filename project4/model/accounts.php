<?php
class accounts {
    private $email, $fname, $lname, $birthday,$password;

    public function __construct($email, $fname, $lname, $birthday,$password) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
}
?>