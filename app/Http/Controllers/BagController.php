<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class BagController extends Controller
{
    public function index()
    {
        return Inertia::render('Bag');
    }
}
