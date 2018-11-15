<?php

class View {

    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function view() {
        include 'views/' . $this->filename . '.php';
    }

}