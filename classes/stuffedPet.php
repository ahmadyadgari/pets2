<?php
class StuffedPet extends Pet {
    private $size;
    private $stuffingType;
    private $material;

    public function __construct($animal, $color, $size, $stuffingType, $material) {
        parent::__construct($animal, $color);
        $this->size = $size;
        $this->stuffingType = $stuffingType;
        $this->material = $material;
    }

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
