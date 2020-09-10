<?php

namespace App\Controllers;

class Frontpage extends BaseController
{
    public function index()
    {
        $data = array('title' => 'E-RAPAT Applications');

        echo view('layouts/template_public/template_public_header', $data);
        echo view('layouts/template_public/template_public_navbar', $data);
        echo view('frontpages');
    }
}
