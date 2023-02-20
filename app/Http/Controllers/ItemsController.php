<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bag;
use App\Models\Item;
use App\Models\User_game;

class ItemsController extends Controller
{
    public function sell(Request $request)
    {
        if($request->user())
        {
            $userId = $request->user()->id;
            $id = $request->input('id');
            // $id = 1;
            
            $item = Bag::join('items', 'items.id', '=', 'bags.id_item')
                ->where('bags.id_user', $userId)
                ->where('bags.id_item', $id)
                ->select('bags.*', 'items.sell')
                ->first();

            // dd($item);
            // if item exist, if count > 0
            if($item && $item->count > 0)
            {
                $item->count--;
                $item->save();
                $user = User_game::find($userId);
                // dd($user);
                $user->money += $item->sell;
                $user->save();

                return true;
            }
        }
        return false;
    }

    public function useItem(Request $request)
    {
        // TODO
        // verify if user have item
        // if have, verify if item is heal or other
        // if heal, verify if hp is full
        // if not full, use item

        if($request->user())
        {
            $userId = $request->user()->id;
            $idItem = $request->input('idItem');
            // $id = 1;
            
            $item = Bag::join('items', 'items.id', '=', 'bags.id_item')
                ->where('bags.id_user', $userId)
                ->where('bags.id_item', $idItem )
                ->select('bags.*', 'items.type', 'items.power')
                ->first();

            // dd($item);
            // if item exist, if count > 0
            if($item && $item->count > 0)
            {
                $idPokemon = $request->input('idPokemon');
                $pokemon = new PokemonController();

                switch ($item->type) {
                    case 'heal':
                        $response = $pokemon->heal($idPokemon, $item->power, $userId);
                        break;
                    case 'exp':
                        $response = $pokemon->xpUP($idPokemon, $item->power, $userId);
                        break;
                }

                if($response)
                {
                    $item->count--;
                    $item->save();
                    return true;
                }
            }
        }

        return false;
    }
}
