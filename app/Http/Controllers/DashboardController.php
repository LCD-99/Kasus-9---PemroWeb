<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function manager()
    {
        return view('manajer.dashboard');
    }

    public function staff()
    {
        return view('staff.dashboard');
    }
}
