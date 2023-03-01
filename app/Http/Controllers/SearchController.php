<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {
        // $test = DB::table('DT_SDT')->get();
        // dd($test);

        if ($request->search == null) {
            return redirect('/');
        }

        $nop = $request->search;

        $exist = DB::table('DT_SDT')->where('nop', $request->search)->get();
        $penyampaian = DB::table('DT_SDT')->where('nop', $request->search)->where('status_penyampaian', 1)->get();
        $tracking = 0;

        if ($penyampaian->isNotEmpty()) {
            $tracking = 4;
            $data = $penyampaian;
        } else if ($exist->isNotEmpty()) {
            $tracking = 3;
            $data = $exist;
        } else {
            $tracking = 1;
            $data = [];
        }



        return view('show', compact(['data', 'tracking', 'nop']));
    }
}
