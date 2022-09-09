<?php

namespace App\Http\Controllers\Pelanggan;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\Pricelist;
use App\Models\Fotografer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PesananRequest;
use Symfony\Component\HttpFoundation\Response;

class PesananpelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $pesanans = Pesanan::where('user_id',auth()->user()->id)->paginate(1);

        return view('pelanggan.pesananpelanggan.index',compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pesan(Request $request)
    {

        $pricelists = Pricelist::get()->pluck('nama_paket', 'id');
        $fotografers = Fotografer::get()->pluck('nama_lengkap', 'id');
        $pricelistId = $request->get('pricelist_id');
        $timeFrom = $request->get('time_from');
        // return view('pelanggan.pesananpelanggan.create', compact('timeFrom',));
        return view('pelanggan.pesananpelanggan.create', compact( 'pricelists', 'pricelistId', 'timeFrom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesananRequest $request)
    {

        $orderDate = date('Y-m-d H:i:s');
        $paymentDue = (new \DateTime($orderDate))->modify('+1 hour')->format('Y-m-d H:i:s');

        $pesan = Pesanan::create($request->validated() + [
            'user_id'=>auth()->id()
        ]);

        return redirect()->route('pesananpelanggan.index')->with([
            'message' => 'Data berhasil ditambahkan !',
            'alert-type' => 'success'
        ]);
    }
    public function show(Pesanan $pesanan)
    {
        $users = User::get()->pluck('name', 'id');
        $pricelists = Pricelist::get()->pluck('nama_paket', 'id');
        $fotografers = Fotografer::get()->pluck('nama_lengkap', 'id');

        return view('pelanggan.pesananpelanggan.show', compact('pesanan', 'users', 'pricelists','fotografers'));
    }

}
