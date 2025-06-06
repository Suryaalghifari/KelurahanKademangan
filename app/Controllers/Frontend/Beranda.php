<?php

namespace App\Controllers\Frontend;

class Beranda extends \App\Controllers\BaseController {
    public function index() {
        return view('frontend/beranda');//
    }
}