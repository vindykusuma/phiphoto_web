@extends('layouts.main')
@section('judul','Hubungi Kami')
@section('content')
    <!-- ======= Hubungi Kami Section ======= -->
    <section id="hubungi" class="hubungi">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <div class="col-lg-12 py-5">
                <h2>Hubungi Kami</h2>
                <p>Scan barcode dibawah ini untuk pertanyaan, saran, dan tawaran kerjasama dengan kami.</p>
                    <p>Terima kasih</p>
            </div>
          </div>

            <div class="row">
                <div class="col-lg-3 mx-auto">
                <img src="{{ asset('admin/img/scan.jpg')}}" class="img-fluid"  alt="Responsive image">
                </div>
            </div>
        </div>
      </section><!-- End Hubungi Kami Section -->


@endsection
