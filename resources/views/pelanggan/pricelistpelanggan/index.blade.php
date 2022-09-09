@extends('layouts.main')
@section('judul','Pricelist')
@section('content')
    <!-- ======= Pricelist Section ======= -->
    <section id="pricelist" class="pricelist">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <div class="col-lg-12 py-5">
          <h2>Pricelist</h2>
          <p>Pricelist merupakan harga-harga paket foto yang kami sediakan, silahkan chat admin untuk informasi lebih lanjut</p>
        </div>
        </div>

        <div class="row">
          @foreach ($pricelists as $pricelist)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">

            <div class="icon-box iconbox-orange ">
                <div class="imgprice">
                    <img src="{{ asset('admin/img/portfolio/camera.jpeg')}}" class="img-fluid" alt="Responsive image">
                </div>
                    <h4><a href="">{{ $pricelist->nama_paket }}</a></h4>
                    <h4>Rp{{ number_format($pricelist->harga,0,',','.') }}</h4>
                    <p>{{ $pricelist->jenisfoto->name }}</p>
                    <p>{{ $pricelist->deskripsi_paket }}</p>
                    <a href="{{ route('pesananpelanggan.create')}}" class="btn btn-primary">Pesan</a>
            </div>
          </div>
          @endforeach
        </div>

      </div>

    </section><!-- End Pricelist -->
@endsection
