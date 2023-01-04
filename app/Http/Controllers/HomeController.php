<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends FrontEndController
{
    public function index()
    {

        return view('pages.main.home',["data" => $this->data]);
    }
}
