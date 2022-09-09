<?php

namespace App\Http\Controllers\Pelanggan;

use App\Models\Pricelist;
use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PricelistRequest;

use Illuminate\Http\Request;

class PricelistpelangganController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function lihat_pricelist()
    {
        $pricelists = Pricelist::all();
        return view('pelanggan.pricelistpelanggan.index',compact('pricelists'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = [];
        $pricelists = Pricelist::all();
        return view('pelanggan.pricelistpelanggan.index',compact('pricelists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pricelist = Pricelist::findOrFail($request->pricelist_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pesanan(Request $request){

        $pricelist= Pricelist::where('status', 0)->get();
        $pricelistId = $request->get('id');

        return view('pesanan', compact('pricelist', 'pricelistId'));
    }
}
