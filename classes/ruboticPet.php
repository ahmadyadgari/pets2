<?php
class RoboticPet extends Pet {
    private $accessories;

    public function __construct($animal, $color) {
        parent::__construct($animal, $color);
        $this->accessories = [];
    }

    // Example methods in the RoboticPet class
    public function getAccessories() {
        return $this->accessories;
    }

// Example methods in the StuffedPet class
    public function getSize() {
        return $this->size;
    }

    public function getStuffingType() {
        return $this->stuffingType;
    }

    public function getMaterial() {
        return $this->material;
    }
}
