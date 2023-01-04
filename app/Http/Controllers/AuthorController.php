<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends FrontEndController
{
    public function index()
    {
        return view('pages.main.Author',['data' => $this->data]);
    }
}
