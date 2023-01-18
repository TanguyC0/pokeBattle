<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\box;

class PokemonController extends Controller
{
    public function xpUP($quantity, $id)
    {
        $data = Box::where('id', $id)->first();
        $xp = $data->xp+$quantity;
        $xpMax = ($data->level * 100)+ceil($data->level ** 2 * 10.5);

        if($data->level >= 100)
            $xp = 0;

        while($xp >= $xpMax){
            $data= $this->levelUP($data);
            $xp = $xp - $xpMax;
            $xpMax = ($data->level * 100)+ceil($data->level ** 2 * 10.5);
        }

        $data->xp = $xp;
        $data->save();

        return redirect()->route('box');

    }

    private function levelUP($data)
    {
        $data->level = $data->level + 1;
        $data->hp = $data->hp + 10;
        $data->attack = $data->attack + 5;
        $data->defense = $data->defense + 5;
        return $data;
    }
}
