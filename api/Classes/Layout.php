<?php

namespace api\classes;

class Layout {
    
    protected $view;

    public function add($view) {
        $this->view = $view;
    }

    public function load() {
        return "../api/views/{$this->view}.php";
    }
}