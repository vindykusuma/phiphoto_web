<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pricelist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CariPesananController extends Controller
{
    public function index(Request $request){
        $time_from = $request->input('time_from');

        if ($request->isMethod('POST')) {
            $pricelists = Pricelist::with('pesanan')->whereHas('pesanan', function ($q) use ($time_from) {
                $q->where(function ($q2) use ($time_from) {
                    $q2->where('time_from', '>=', $time_from)
                       ->orWhere('status', 'selesai')
                       ->orWhere('status', 'batal');
                });
            })->orWhereDoesntHave('pesanan')->get();
        } else {
            $pricelists = [];
        }

        return view('admin.cari_pesanans.index', compact('pricelists', 'time_from'));
    }
}
