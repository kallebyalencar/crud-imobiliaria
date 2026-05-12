<?php

class HomeController {
    public function index() {
        require_once '../app/Views/home/home-page.php';
    }

    public function sobre() {
        require_once '../app/Views/home/about.php';
    }

}

?>