<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use App\Models\User;
use App\Models\Pricelist;
use App\Models\Fotografer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\PesananRequest;
use Symfony\Component\HttpFoundation\Response;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('pesanan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesanans = Pesanan::all();

        return view('admin.pesanans.index', compact('pesanans'));
    }

     /**
     * Show the form for creating new pesanan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if(Gate::denies('pesanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $fotografers = Fotografer::get()->pluck('nama_lengkap', 'id');
        $pricelists = Pricelist::get()->pluck('nama_paket', 'id');
        $pricelistId = $request->get('pricelist_id');
        $timeFrom = $request->get('time_from');

    return view('admin.pesanans.create', compact( 'fotografers', 'pricelists', 'pricelistId', 'timeFrom'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesananRequest $request)
    {
        abort_if(Gate::denies('pesanan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        Pesanan::create($request->validated() + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.pesanans.index')->with([
            'message' => 'Data berhasil ditambahkan !',
            'alert-type' => 'success'
        ]);
    }

     /**
     * Display Pesanan.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        abort_if(Gate::denies('pesanan_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pesanans.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        abort_if(Gate::denies('pesanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::get()->pluck('name', 'id');
        $pricelists = Pricelist::get()->pluck('nama_paket', 'id');
        $fotografers = Fotografer::get()->pluck('nama_lengkap', 'id');

        return view('admin.pesanans.edit', compact('pesanan', 'users', 'pricelists','fotografers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PesananRequest $request, Pesanan $pesanan)
    {
        abort_if(Gate::denies('pesanan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Pesanan::where('id',$pesanan->id)->update($request->validated());

        return redirect()->route('admin.pesanans.index')->with([
            'message' => 'Data berhasil diperbarui !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        abort_if(Gate::denies('pesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesanan->delete();

        return redirect()->route('admin.pesanans.index')->with([
            'message' => 'Data berhasil dihapus !',
            'alert-type' => 'danger'
        ]);
    }

        /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('pesanan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Pesanan::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
