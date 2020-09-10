<?php

namespace App\Controllers;

class Frontpage extends BaseController
{
    public function index()
    {
        return view('frontpages');
    }

    public function calendarapi()
    {
        echo 'hello worlds';
    }
}
