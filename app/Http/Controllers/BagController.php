<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class BagController extends Controller
{
    public function index(string $type = "%")
    {
        // $list = Bag::where('grade' , '=', 'commun')->get();
        $list = DB::table('bags')->join('items', 'bags.id_item', '=', 'items.id')
        ->select('bags.*', 'items.name')
        ->where('type' , 'like', $type)
        ->get();
        // dd($list);

        return Inertia::render('Bag', ['listitem' => $list]);
    }


}