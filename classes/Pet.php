<?php

class Pet {
    private $animal;
    private $color;
    private $age;

    public function __construct($animal, $color, $age = null) {
        $this->animal = $animal;
        $this->color = $color;
        $this->age = $age;
    }

    public function getAnimal() {
        return $this->animal;
    }

    public function getColor() {
        return $this->color;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAnimal($animal) {
        $this->animal = $animal;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function __toString() {
        return "Pet [Animal: " . $this->animal . ", Color: " . $this->color . ", Age: " . $this->age . "]";
    }
}
