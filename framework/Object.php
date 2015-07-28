<?php
namespace framework;

class Object {
    public function __get($name) {
        $methodName = 'get' . ucfirst($name);
        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        }
    }

    public function __set($name, $value) {
        $methodName = 'set' . ucfirst($name);
        if (method_exists($this, $methodName)) {
            $this->$methodName($value);
        }
    }
}