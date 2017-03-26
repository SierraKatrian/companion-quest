<?php

class Dice {
    private $id;
    private $charID;
    private $name;
    private $quantity;
    private $sides;
    private $modifier;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }

    public function getCharId() {
        return $this->charID;
    }

    public function setCharId($value) {
        $this->charID = $value;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($value) {
        $this->quantity = $value;
    }

    public function getSides() {
        return $this->sides;
    }

    public function setSides($value) {
        $this->sides = $value;
    }

    public function getModifier() {
        return $this->modifier;
    }

    public function setModifier($value) {
        $this->modifier = $value;
    }
}

?>
