@extends('layouts.main')
@section('judul','Pesanan')
@section('content')

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
             <div class="col-lg-12 py-5">
                <h2>Lihat Pesanan</h2>
            </div>
        </div>
    <div class="container-fluid">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header py-3 d-flex">
            <div class="ml-auto">
                <a href="{{ route('pesananpelanggan.index') }}" class="btn btn-secondary">
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
                        <td>Rp{{ number_format($pesanan->pricelist->harga,0,',','.') }}
                            <a href="https://api.whatsapp.com/send?phone=6281271102240&text">
                            <span class="text">{{ __('Konfirmasi Pembayaran') }}</span>
                            </a>
                        </td>
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
                    <a href="{{ asset('admin/img/qris.jpg')}}" class="btn btn-primary">
                        <span class="text">{{ __('Barcode Pembayaran') }}</span>
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- Content Row -->

</div>
</div>
</section>
@endsection


@push('style-alt')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endpush

@push('script-alt')
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: "YYYY-MM-DD HH:mm"
        });
    </script>
@endpush
