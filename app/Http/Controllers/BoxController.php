<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\box;


class BoxController extends Controller
{
    public function index()
    {
        $list = Box::all();
        return Inertia::render('Box', ['listitem' => $list]);
    }
}
