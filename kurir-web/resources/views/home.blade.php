@extends('layouts.app')

@section('title', 'Beranda - Becat Kurir NTB')

@section('content')
    {{-- Hero Section --}}
    <section id="hero" class="hero section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center content">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <h2>
                        Selamat Datang di
                        <span class="text-primary">Becat Kurir NTB</span>
                    </h2>
                    <p class="lead">
                        Solusi pengiriman cepat dan terpercaya di Nusa Tenggara Barat.
                        Kami siap menjemput dan mengantarkan paket Anda dengan aman,
                        tepat waktu, dan harga terjangkau. Didukung oleh tim profesional
                        dan layanan customer support yang responsif.
                    </p>
                    <div class="cta-buttons" data-aos="fade-up" data-aos-delay="300">
                        <a href="" class="btn btn-primary">Pesan Sekarang</a>
                        <a href="" class="btn btn-outline">Lacak Kiriman</a>
                    </div>
                    <div class="hero-stats mt-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="stat-item">
                            <span class="stat-number">5+</span>
                            <span class="stat-label">Tahun Pengalaman</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label">Paket Terkirim</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">95%</span>
                            <span class="stat-label">Tingkat Kepuasan Pelanggan</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="{{ asset('assets/img/hero-2.png') }}" alt="Kurir Becat NTB"
                             class="img-fluid retina-logo" data-aos="zoom-out" data-aos-delay="300"
                             style="width: 300%; height: auto;" />
                        <div class="shape-1"></div>
                        <div class="shape-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Include Section lainnya --}}
    @include('partials.about')
    {{-- @include('partials.resume') --}}
    @include('partials.portfolio')
    @include('partials.testimoni')
    @include('partials.service')
    @include('partials.order')
@endsection
