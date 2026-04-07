<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller {

    public function home() {
        return Inertia::render('Home');
    }

    public function map() {
        return Inertia::render('Map/Map',[
            'catalogues' => Auth::check() ? Auth::user()->catalogues : []
        ]);
    }
}