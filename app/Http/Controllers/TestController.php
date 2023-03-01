<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //

    public function index()
    {
        // $test = DB::table('DT-SDT')->get();
        // var_dump($test);
        $test = DB::table("DT_SDT")->get();
        return view('index');
    }

    public function show()
    {
        return view('show');
    }
}
