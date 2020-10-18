<?php

class Pokemon
{
    public $number;
    public $name;    
    public $types;    
    public $img;
    
    function getNumber() {
        return $this->number;
    }

    function getName() {
        return $this->name;
    }

    function getTypes() {
        return $this->types;
    }

    function getImg() {
        return $this->img;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setTypes($types) {
        $this->types = $types;
    }

    function setImg($img) {
        $this->img = $img;
    }


}

