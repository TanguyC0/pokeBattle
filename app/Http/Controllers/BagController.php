<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class BagController extends Controller
{
    public function index(Request $request)
    {
        $list = [];
        if($request->user())
        {
            $id = $request->user()->id;

            $type = $request->input('type');
            if($type == 'all')
            {
                $type = "%";
            }

            // $list = Bag::where('grade' , '=', 'commun')->get();
            $list = DB::table('bags')->join('items', 'bags.id_item', '=', 'items.id')
            ->select('bags.*', 'items.name')
            ->where('type' , 'like', $type)
            ->where('count' , '>', 0)
            ->where('id_user' , '=', $id)
            ->get();
            // dd($list);
        }

        // return Inertia::render('Bag', ['listitem' => $list]);
        return $list;
    }


}