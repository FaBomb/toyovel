i<?php

class Loader {

    private $vendorDir;
    private $classMap = array();

    public function __construct($vendorDir = null) {
        $this->vendorDir = $vendorDir;
    }

    public function getClassMap() {
        return $this->classMap;
    }

    public function addClassMap(array $classMap) {
        if ($this->classMap) {
            $this->classMap = array_merge($this->classMap, $classMap);
        } else {
            $this->classMap = $classMap;
        }
    }

    public function findFile($class) {
        if (isset($this->classMap[$class])) {
            return $this->classMap[$class];
        }
    }
}
