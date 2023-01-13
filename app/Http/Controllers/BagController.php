<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\bag;


class BagController extends Controller
{
    public function index()
    {
        $list = Bag::all();
        return Inertia::render('Bag', ['listitem' => $list]);
    }
}
