<?php

namespace api\classes;

class Validation {

    private $validate = [];

    public function validate($post) {

        foreach ($post as $campo => $valor) {
            
            $this->validate[$campo] = filter_var($valor, FILTER_SANITIZE_STRING);
            if ($this->validate[$campo] === "" || $this->validate[$campo] === "") {
                
                $this->validate[$campo] = null;
            }
        }

        return (object) $this->validate;
    }
}
