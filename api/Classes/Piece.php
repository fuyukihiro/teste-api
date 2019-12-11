<?php

namespace api\classes;

class Piece extends Layout {
    public function load() {
        return "../api/views/pieces/{$this->view}.php";
    }
}
