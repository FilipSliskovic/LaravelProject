<?php

namespace App\Http\Controllers;

use App\Models\Rezervation;
use Illuminate\Http\Request;

class AdminRezervationController extends BackEndController
{
    public function index()
    {
        $this->data['rezervation'] = Rezervation::with('table')->with('user')->paginate(10);


        return view('pages.admin.AdminRezervations', ['data' => $this->data]);
    }
}
