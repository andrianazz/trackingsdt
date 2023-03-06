<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
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

        $nopExplode = explode("-", $request->search);
        $nop = implode("", $nopExplode);



        if ($request->search == null) {
            return redirect('/');
        }

        $year = Carbon::now()->format('Y');



        $exist = DB::table('DT_SDT')->where('nop', $nop)->where('tahun', '!=', $year)->get();
        $exist2 = DB::table('DT_SDT')->where('nop', $nop)->where('tahun', $year)->whereNull('status_penyampaian')->get();
        $penyampaian = DB::table('DT_SDT')->where('nop', $nop)->where('tahun', $year)->where('status_penyampaian', 1)->get();
        $tracking = 0;





        if ($penyampaian->isNotEmpty()) {
            $tracking = 4;
            $data = $penyampaian;
        } else if ($exist2->isNotEmpty()) {
            $tracking = 4;
            $data = null;
        } else if ($exist->isNotEmpty()) {
            $tracking = 1;
            $data = null;
        } else {
            $tracking = 1;
            $data = null;
        }



        return view('show', compact(['data', 'tracking', 'nop']));
    }
}
