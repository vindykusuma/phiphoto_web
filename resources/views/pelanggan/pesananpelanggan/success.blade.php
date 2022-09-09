@extends('layouts.main')
@section('judul','Pesanan')
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <div class="col-lg-12 py-5">
            <h2>Keranjang Pesanan</h2>
          </div>
          </div>
          <div class="ml-auto">
            <a href="" class="btn btn-success">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">{{ __('Tambah Pesanan') }}</span>
            </a>
        </div>

@endsection
