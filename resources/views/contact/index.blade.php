@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/contact.jpg') }}" alt="">
    </div>
    <!-- Contact Section Start -->
    <div class="container-breadcrumb" style="text-align:center;">
        <p>Home > Kontak</p>
    </div>    
    <section class="contact" id="contact">
        <h2><span>Kontak</span> Kami</h2>        
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.099325122615!2d107.5647087!3d-6.887629!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e42d237a796b%3A0x69aee5fd1ac398c2!2sSND%20Racing!5e0!3m2!1sid!2sid!4v1703272885460!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form onsubmit="sendWAMessage(event)">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" id="nama" placeholder="Nama">
                </div>
                {{--<div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" id="no_hp" placeholder="No Hp">
                </div>--}}
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" id="pesan" placeholder="Pesan Anda">
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->
    
    <script>
    function sendWAMessage(event) {
        event.preventDefault(); 
        
        var nama = $('#nama').val();
        
        var pesan = $('#pesan').val();

        if (nama && pesan) {            
            var message = `Hallo perkenalkan saya ${nama}, saya ingin bertanya: ${pesan}.`;            
            var urlWhatsApp = `https://wa.me/6283829050592?text=${encodeURIComponent(message)}`;
            
            window.open(urlWhatsApp, '_blank');
        } else {
            Swal.fire({
                title: "Lengkapi semua kolom",
                icon: "error"
            });
        }
    }
    </script>
@endsection
