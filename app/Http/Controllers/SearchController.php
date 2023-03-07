<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function index()
    {
        return Inertia::render('Search/Index', [
            'search_url' => route('search'),
        ]);
    }

    public function toWeb(){
        return Inertia::location('https://simpbb.pekanbaru.go.id');
    }

    public function search(Request $request)
    {
        $request->validate([
          'search' => ['required', 'numeric'],
        ]);

        $nopExplode = explode("-", $request->search);
        $nop = implode("", $nopExplode);

        if ($request->search == null) {
            return redirect('/');
        }

        $year = Carbon::now()->format('Y');

        $isNotCurrentYear = DB::table('DT_SDT')->where('nop', $nop)->where('tahun', '!=', $year)->get();
        $isStatusExist = DB::table('DT_SDT')->where('nop', $nop)->where('tahun', $year)->whereNull('status_penyampaian')->get();
        $isTaken = DB::table('DT_SDT')->where('nop', $nop)->where('tahun', $year)->where('status_penyampaian', 1)->where(function (Builder $query) {
            $query->whereNotNull('status_wp')->orWhereNotNull('status_op');
        })->get();
        $isDelivered = DB::table('DT_SDT')->where('nop', $nop)->where('tahun', $year)->where('status_penyampaian', 1)->where(function (Builder $query) {
            $query->whereNull('status_wp')->whereNull('status_op');
        })->get();
        $status = 0;

        $message = null;

        if ($isTaken->isNotEmpty()) {
            $status = 4;
            $data = $isTaken;
        } else if ($isDelivered->isNotEmpty()) {
            $status = 4;
            $data = $isDelivered;
        } else if ($isStatusExist->isNotEmpty()) {
            $status = 3;
            $data = null;
        } else if ($isNotCurrentYear->isNotEmpty()) {
            $status = 1;
            $data = null;
        } else {
            $status = 1;
            $data = null;
            $message = "Data tidak ditemukan/NOP salah. Mohon periksa kembali NOP yang anda inputkan.";
        }

        return Inertia::render('Search/Index', [
            'data' => $data,
            'status' => $status,
            'nop' => $nop,
            'message' => $message
        ]);
    }
}
