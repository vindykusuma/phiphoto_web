@extends('layouts.main')
@section('judul','Tentang Kami')
@section('content')
<section id="tentang" class="tentang">

    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <div class="row">
            <div class="col-lg-12 py-5">
        <h2>Tentang Kami</h2>
        <p>Phi Photograph merupakan salah satu jasa foto freelancer yang aktif di Kota Nganjuk, Jawa Timur. </p>
        <p>Tim yang beranggotakan 4 orang yang masing-masing memiliki pengalaman dalam bidang fotografi dan muldia yang dimiliki.
        Phi Photograph menyediakan berbagai paket foto yang menarik sehingga banyak anak muda dan orang tua merasa puas dengan hasil yang diberikan.
        Saat ini Phi Photograph sedang mengupgrade teknologi yang dimilikinya salah satunya website yang menyediakan layanan pemesanan sehingga memudahkan Phi Photograph berkomunikasi dengan pelanggan setia mereka.
      </p>

      <div class="row">
        <div class="col-lg-4 mx-auto">
          <img src="{{ asset('admin/img/logo.png')}}" class="img-fluid" alt="">
        </div>
      </div>
  </section>
@endsection
