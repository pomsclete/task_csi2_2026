<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function dashboard()
    {
        return view('employe.dashboard');
    }

    public function mesTaches()
    {
        return view('employe.mes-taches');
    }
}
