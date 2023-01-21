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

    public function walk()
    {
        $value = rand(1, 10);
        if ($value <= 5) {
            return Inertia::render('Aventure', [
                'message' => 'Vous avez trouvé un coffre',
            ]);
        } else {
            return Inertia::render('Aventure', [
                'message' => 'Vous n\'avez rien trouvé',
            ]);
        }
    }
}
