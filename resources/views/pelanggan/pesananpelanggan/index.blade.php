@extends('layouts.main')
@section('judul','Pesanan')
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <div class="col-lg-12 py-5">
            <h2>List Pesanan</h2>
          </div>
          </div>
          <div class="ml-auto">
            <a href="/pesananpelanggan/create" class="btn btn-success">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">{{ __('Tambah Pesanan') }}</span>
            </a>
        </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-booking" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Fotografer</th>
                            <th>Lokasi Pemotretan</th>
                            <th>Tanggal Pemotretan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesanans as $index => $pesanan )
                            <tr data-entry-id="{{ $pesanan->id }}">
                                <td>{{ $pesanans->perPage() * $pesanans->currentPage() + $index  }}</td>
                                <td>{{ $pesanan->user->name }}</td>
                                <td>{{ $pesanan->pricelist->nama_paket }}</td>
                                <td>{{ $pesanan->fotografer?->nama_lengkap ?? '-'}}</td>
                                <td>{{ $pesanan->alamat }}</td>
                                <td>{{ $pesanan->time_from }}</td>
                                <td>{{ $pesanan->status }}</td>
                                <td>
                                    <a href="{{ route('pesananpelanggan.show', $pesanan->id) }}">Lihat Pesanan
                                        {{-- <i class="fa fa-eye"></i> --}}
                                    </a>

                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">{{ __('Data Kosong') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $pesanans->links() }}
            </div>
        </div>

        </div>
      </section><!-- End Contact Section -->
@endsection
