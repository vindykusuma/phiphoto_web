@extends('layouts.admin')

@section('content')
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

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header py-3 d-flex">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Pesanan') }}</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin.pesanans.index') }}" class="btn btn-secondary">
                        <span class="text">{{ __('Kembali') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pesanans.update', $pesanan->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="user">{{ __('Pelanggan') }}</label>
                        <select class="form-control" name="user_id" id="user">
                            @foreach($users as $id => $user)
                                <option value="{{ $id }}">{{ $user }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pricelist">{{ __('Nama Paket') }}</label>
                        <select class="form-control" name="pricelist_id" id="pricelist">
                            @foreach($pricelists as $id => $pricelist)
                                <option value="{{ $id }}">{{ $pricelist }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fotografer">{{ __('Fotografer') }}</label>
                        <select class="form-control" name="fotografer_id" id="fotografer">
                            @foreach($fotografers as $id => $fotografer)
                                <option value="{{ $id }}">{{ $fotografer }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time_from">{{ __('Tanggal') }}</label>
                        <input type="text" class="form-control datetimepicker" id="time_from" name="time_from" value="{{ old('time_from', $pesanan->time_from) }}" />
                    </div>
                    <div class="form-group">
                        <label for="no_hp">{{ __('Nomor Telepon') }}</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp',$pesanan->no_hp) }}" />
                    </div>
                    <div class="form-group">
                        <label for="alamat">{{ __('Alamat') }}</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10">{{ old('alamat',$pesanan->alamat) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="catatan_tambahan">{{ __('Catatan Tambahan') }}</label>
                        <textarea class="form-control" name="catatan_tambahan" id="catatan_tambahan"  >{{ old('catatan_tambahan', $pesanan->catatan_tambahan) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select class="form-control" name="status" id="status">
                                <option value="0" {{ $pesanan->status == 0 ? 'selected' : null }} >Open</option>
                                <option value="1" {{ $pesanan->status == 1 ? 'selected' : null }} >Proses</option>
                                <option value="2" {{ $pesanan->status == 2 ? 'selected' : null }} >Cetak</option>
                                <option value="3" {{ $pesanan->status == 3 ? 'selected' : null }} >Selesai</option>
                                <option value="4" {{ $pesanan->status == 4 ? 'selected' : null }} >Ambil</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
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
