@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Lihat Pesanan') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.pesanans.index') }}" class="btn btn-secondary">
                        <span class="text">{{ __('Kembali') }}</span>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <tr>
                            <th>pelanggan</th>
                            <td>{{ $pesanan->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Pricelist</th>
                            <td>{{ $pesanan->pricelist->nama_paket }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $pesanan->time_from }}</td>
                        </tr>
                        <tr>
                        <tr>
                            <th>No.Telepon</th>
                            <td>{{ $pesanan->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Fotografer</th>
                            <td>{{ $pesanan->$pesanan->fotografer?->nama_lengkap ?? '-' }}</td>
                        </tr>
                            <tr>
                            <th>Total</th>
                            <td>Rp{{ number_format($pesanan->pricelist->harga,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pemotretan</th>
                            <td>{{ $pesanan->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Tambahan</th>
                            <td>{{ $pesanan->catatan_tambahan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $pesanan->status }}</td>
                        </tr>
                    </table>

                    <div class="ml-auto">
                        @can('pesanan_create')
                        <a href="{{ asset('admin/img/qris.jpg')}}" class="btn btn-primary">
                            <span class="text">{{ __('Barcode Pembayaran') }}</span>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection
