// Ahmad Reshad Yadgari
// File pet.php class  5/21/2024

<?php

class Pet {
    private $animal;
    private $color;
    // Additional property
    private $age;

    // Updated constructor with an optional age parameter
    public function __construct($animal, $color, $age = null) {
        $this->animal = $animal;
        $this->color = $color;
        $this->age = $age;
    }

    // Getters
    public function getAnimal() {
        return $this->animal;
    }

    public function getColor() {
        return $this->color;
    }

    public function getAge() {
        return $this->age;
    }

    // Setters
    public function setAnimal($animal) {
        $this->animal = $animal;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    // ToString method
    public function __toString() {
        return "Pet [Animal: " . $this->animal . ", Color: " . $this->color . ", Age: " . $this->age . "]";
    }
}
