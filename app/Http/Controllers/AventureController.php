<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AventureController extends Controller
{
    public function index()
    {
        return Inertia::render('Aventure');
    }
}
