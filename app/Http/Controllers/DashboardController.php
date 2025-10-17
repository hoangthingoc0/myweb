<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function study(){
        return view('dashboard.study');
    }

    public function flashcard(){
        return view('dashboard.flashcard');
    }
}

