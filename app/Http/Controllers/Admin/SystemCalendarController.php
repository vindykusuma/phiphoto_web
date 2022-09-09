<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Pricelist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fotografer;
use App\Models\Pesanan;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => Pesanan::class,
            'date_field' => 'time_from',
            'date_field_to' => 'time_to',
            'field'      => 'alamat',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.pesanans.show',
        ],
    ];

    public function index(Request $request)
    {
        $pesanans = [];
        $pricelists = Pricelist::all()->pluck('nama_paket', 'id');
        $fotografers = Fotografer::all()->pluck('nama_lengkap', 'id');

        foreach ($this->sources as $source) {
            $models = $source['model']::when($request->input('pricelist_id'), function ($query) use ($request) {
                    $query->where('pricelist_id', $request->input('pricelist_id'));
                })
                ->when($request->input('fotografer_id'), function ($query) use ($request) {
                    $query->where('fotografer_id', $request->input('fotografer_id'));
                })
                ->get();
            foreach ($models as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);
                $crudFieldValueTo = $model->getOriginal($source['date_field_to']);

                if (!$crudFieldValue && $crudFieldValueTo) {
                    continue;
                }

                $pesanans[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'end' => $crudFieldValueTo,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('pesanans', 'pricelists', 'fotografers'));

    }

}
