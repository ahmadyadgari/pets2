<?php

class RoboticPet extends Pet {
    private $accessories;

    public function __construct($animal, $color) {
        parent::__construct($animal, $color);
        $this->accessories = [];
    }

    public function getAccessories() {
        return $this->accessories;
    }

    public function addAccessory($accessory) {
        $this->accessories[] = $accessory;
    }
}

