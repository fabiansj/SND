@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/about.png') }}" alt="">
    </div>
    <!-- About Section Start -->
    <Section class="about" id="about">
        <h2><span>Tentang</span> Kami</h2>
        <div class="container-about">
            <div class="row">
                <div class="about-img">
                    <img src="{{ asset('img/about1.jpg') }}" alt="tentang kami">
                </div>
                <div class="content">
                    <h3>OUR STORY</h3>
                    <p>Sejak tahun 2000 hingga sekarang, SND RACING PRODUCT telah berkembang pesat dalam menghasilkan produk
                        yang berkelas dan berkualitas.
                        Kerja keras kami selama lebih dari 20 tahun, telah menempa kami menjadi Inovator , Kreatif dan
                        Handal dalam menjadikan produk-produk unggulan yang berkualitas.
                        Dengan riset yang mendalam dan uji coba di lapangan secara maksimal, kami mampu menghasilkan produk
                        yang presisi, aman dan pantas menjadi bagian dari kendaraan juara Anda, karena DNA kami adalah DNA
                        Juara.
                        SALAM JUARA..!!</p>
                </div>
            </div>
        </div>
    </Section>
    <!-- About Section End -->

    <!-- OurTeam Section Start-->
    <section class="ourteam">
        <div class="container-ourteam">
            <h2><span>OUR</span> TEAM</h2>
            <div class="ourteam-card">
                <div class="ourteam-img">
                    <img src="{{ asset('img/ourteam/wawan.png') }}" alt="">
                    <h1>Wawan Wello</h1>
                    <p>ARRC 2019-2020</p>
                    <div class="linier-img">
                    </div>
                </div>
                <div class="ourteam-img">
                    <img src="{{ asset('img/ourteam/m_hildan.png') }}" alt="">
                    <h1>M. Hildan</h1>
                    <p>ARRC 2020</p>
                    <div class="linier-img">
                    </div>
                </div>
                <div class="ourteam-img">
                    <img src="{{ asset('img/ourteam/h_sandy.png') }}" alt="">
                    <h1>H Sandy Agung</h1>
                    <p>Ex-Rider 2020</p>
                    <div class="linier-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ourteam Section End -->
@endsection
